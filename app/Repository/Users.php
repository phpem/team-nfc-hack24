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
        return [];
    }

    public function getUserById($userID)
    {
        return [];
    }

}