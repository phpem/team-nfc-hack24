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
        $dummyData = [
            ['id' => '1', 'email' => 'me1@me.com', 'password' => '', 'remember_token' => '', 'created_at' => '', 'first_name' => 'A1', 'last_name' => 'B1'],
            ['id' => '2', 'email' => 'me2@me.com', 'password' => '', 'remember_token' => '', 'created_at' => '', 'first_name' => 'A2', 'last_name' => 'B2'],
            ['id' => '3', 'email' => 'me3@me.com', 'password' => '', 'remember_token' => '', 'created_at' => '', 'first_name' => 'A3', 'last_name' => 'B3'],
            ['id' => '4', 'email' => 'me4@me.com', 'password' => '', 'remember_token' => '', 'created_at' => '', 'first_name' => 'A4', 'last_name' => 'B4'],
            ['id' => '5', 'email' => 'me5@me.com', 'password' => '', 'remember_token' => '', 'created_at' => '', 'first_name' => 'A5', 'last_name' => 'B5'],
            ['id' => '6', 'email' => 'me6@me.com', 'password' => '', 'remember_token' => '', 'created_at' => '', 'first_name' => 'A6', 'last_name' => 'B6'],
        ];


        $entities = [];
        foreach ($dummyData as $data) {
            $entities[] = EntityFactory::get('UserEntity', $data);
        }

        return $entities;
    }

    public function getUserById($userID)
    {
        $data = [
            'user_id' => $userID
        ];
        return EntityFactory::get('UserEntity', $data);
    }

}