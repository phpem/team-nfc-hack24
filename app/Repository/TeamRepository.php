<?php

namespace Teamnfc\Repository;


use Teamnfc\Entity\EntityFactory;

class TeamRepository extends RepositoryManager {

    public function getTeamById($teamID)
    {

    }

    public function getTeamByOrganisation($org)
    {

    }

    public function getManagerForTeam($team)
    {
        $data =  $this->db->table('team_users')->where('team_id', $team->id)->where('is_manager', 1)->get();

        $entities = [];
        foreach ($data as $teamUser) {
            $user = $this->db->table('users')->where('id', $teamUser->user_id)->get()[0];
            $entities[] = EntityFactory::get('UserEntity', (array)$user);
        }

        return $entities;
    }
}