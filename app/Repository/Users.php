<?php

namespace Teamnfc\Repository;


use Illuminate\Database\DatabaseManager;
use Teamnfc\Entity\EntityFactory;
use Teamnfc\Entity\TeamEntity;
use Illuminate\Database\Connection;


class Users {

    /**
     * @var Connection
     */
    protected $db;

    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    public function getUsers()
    {
        $users =  $this->db->table('users')->get();
        $entities = [];
        foreach ($users as $user) {
            $entities[] = EntityFactory::get('UserEntity', (array)$user);
        }

        return $entities;
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

        $entities = [];
        foreach ($users as $user) {
            $entities[] = EntityFactory::get('UserEntity', (array)$user);
        }

        return $entities;
    }

    public function getUserById($userID)
    {
        $user =  $this->db->table('users')->find($userID);

        return EntityFactory::get('UserEntity', (array)$user);
    }

}