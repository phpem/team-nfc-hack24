<?php

namespace Teamnfc\Repository;


use Teamnfc\Entity\EntityFactory;

class TeamRepository extends RepositoryManager {

    public function getTeamById($teamID)
    {
        $team = $this->db->table('teams')->find($teamID);

        return EntityFactory::get(
            'TeamEntity',
            (array)$team
        );
    }

    public function getTeamByOrganisation($org)
    {

    }

    public function getManagerForTeam($team)
    {

    }

    public function getTotalMembersForTeam($team, $includeManager = true)
    {

    }
}