<?php

namespace Teamnfc\Repository;


use Teamnfc\Repository\RepositoryManager;
use Teamnfc\Entity\EntityFactory;
use Teamnfc\Entity\TeamEntity;



class UsersRepository extends RepositoryManager {

    public function getUsers()
    {
        $users =  $this->db->table('users')->get();

        return $this->getUserEntities($users);
    }

    public function getUsersForTeam($team)
    {
        // select u.* from users AS u INNER JOIN team_users AS tu ON tu.team_id = 3
        $users = $this->db->table('users')
            ->join('team_users', function($join) use ($team)
            {
                $join->on('team_users.user_id', '=', 'users.id')
                ->where('team_users.team_id', '=', $team->id);
            })->get();

        return $this->getUserEntities($users);
    }

    public function getTeamsForUser($user)
    {
        // select t.* from teams AS t INNER JOIN team_users as tu where tu.user_id = 7 AND tu.team_id = t.id
        $teams = $this->db->table('teams')
            ->join('team_users', function($join) use ($user)
            {
                $join->on('team_users.team_id', '=', 'teams.id')
                    ->where('team_users.user_id', '=', $user->id);
            })->get();

        $entities = [];
        foreach ($teams as $data) {
            $entities[] = EntityFactory::get('TeamEntity', (array)$data);
        }

        return $entities;
    }

    public function getUsersByIds($userIDs)
    {
        $users =  $this->db->table('users')->whereIn('id', $userIDs)->get();

        return $this->getUserEntities($users);
    }

    public function getUserById($userID)
    {
        $user =  $this->db->table('users')->find($userID);

        return EntityFactory::get('UserEntity', (array)$user);
    }

    protected function getUserEntities($users)
    {
        $entities = [];
        foreach ($users as $user) {
            $entities[] = EntityFactory::get('UserEntity', (array)$user);
        }

        return $entities;
    }
}