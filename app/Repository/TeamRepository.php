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

    public function getTeamsByOrganisation($org)
    {
        $teams = $this->db->table('teams')->where('org_id', $org->id);

        $entities = [];
        foreach ($teams as $data) {
            $entities[] = EntityFactory::get('TeamEntity', (array)$data);
        }

        return $entities;
    }

    public function getOrganisationForTeam($team) {
        $organisations = $this->db->table('organisations')
            ->join('teams', function($join) use ($team)
            {
                $join->on('teams.org_id', '=', 'organisations.id')
                    ->where('teams.id', '=', $team->id);
            })->get();

        $entities = [];
        foreach ($organisations as $data) {
            $entities[] = EntityFactory::get('OrganisationEntity', (array)$data);
        }

        return $entities;
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

    public function getTotalMembersForTeam($team, $includeManager = true)
    {
        if ($includeManager) {
            return $this->db->table('team_users')->where('team_id',$team->id)->count();
        } else {
            return $this->db->table('team_users')->where('team_id',$team->id)->where('is_manager', 0)->count();
        }
    }
}