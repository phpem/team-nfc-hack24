<?php
/**
 * Created by PhpStorm.
 * User: jamesh
 * Date: 03/05/2015
 * Time: 01:14
 */

namespace Teamnfc\Services;


use Teamnfc\Repository\UsersRepository;
use Teamnfc\Repository\TeamRepository;
use Teamnfc\Repository\CriteriaRepository;
use Teamnfc\Repository\VoteRepository;

class Data {

    protected $usersRepository;
    protected $teamRepository;
    protected $criteriaRepository;
    protected $voteRepository;

    public function __construct(UsersRepository $usersRepository, TeamRepository $teamRepository,
        CriteriaRepository $criteriaRepository, VoteRepository $voteRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->teamRepository = $teamRepository;
        $this->criteriaRepository = $criteriaRepository;
        $this->voteRepository = $voteRepository;
    }

    public function getData($userId)
    {
        $this->getOverall($userId);
        $this->getPositive($userId);
        $this->getNegative($userId);
        $this->getRank($userId);
        $this->getMost($userId);
    }

    public function getOverall($userId, $criteria = null)
    {

        // % of team members which have voted
            // count team members
            // count team members who have voted

        $teamListTotalMembers = [];
        $votedMembersTotals = [];
        $stats = [];

        $manager = $this->usersRepository->getUserById($userId);
        if (!$manager->isManager()) {
            return [];
        }
        $teams = $this->usersRepository->getTeamsForUser(
            $manager
        );
        foreach ($teams as $team) {
            $teamListTotalMembers[$team->id] = $this->teamRepository->getTotalMembersForTeam($team, false);
            $stats[$team->id]['team_name']  = $team->team_name;
            $stats[$team->id]['total']      = $teamListTotalMembers[$team->id];
        }

        foreach ($teamListTotalMembers as $teamId => $total) {
            $votedMembersTotals[$teamId] = $this->voteRepository->getTotalMembersVoted($teamId);
            $stats[$team->id]['percentage'] = ceil(( $votedMembersTotals[$teamId] / $stats[$team->id]['total']  ) * 100) ;
        }


        return $stats;
    }

    public function getPositive($userId)
    {

    }

    public function getNegative($userId)
    {

    }

    public function getRank($userId, $scope = "organisation")
    {

    }

    public function getMost($userId, $type = "positive")
    {

    }
}