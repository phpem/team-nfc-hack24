<?php

namespace Teamnfc\Repository;


use Teamnfc\Entity\EntityFactory;
use Teamnfc\Entity\TeamEntity;

class Users {

    public function getTeamsForUser($user)
    {
        $dummyData = [
            ['id' => '1', 'team_name' => 'team-NFC', 'org_id' => '2', 'created_at' => '', 'updated_at' => ''],
            ['id' => '2', 'team_name' => 'team-NFC', 'org_id' => '2', 'created_at' => '', 'updated_at' => ''],
            ['id' => '3', 'team_name' => 'team-NFC', 'org_id' => '2', 'created_at' => '', 'updated_at' => ''],
            ['id' => '4', 'team_name' => 'team-NFC', 'org_id' => '2', 'created_at' => '', 'updated_at' => ''],
            ['id' => '5', 'team_name' => 'team-NFC', 'org_id' => '2', 'created_at' => '', 'updated_at' => '']
        ];


        $entities = [];
        foreach ($dummyData as $data) {
            $entities[] = EntityFactory::get('TeamEntity', $data);
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