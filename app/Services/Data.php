<?php

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
        $this->getVotesPositive($userId);
        $this->getVotesNegative($userId);
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

        if (!$this->teamRepository->isManager($manager)) {
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

    public function getVotesAll($userId)
    {
        $stats = [];

        $teams = $this->usersRepository->getTeamsForUser(
            $this->usersRepository->getUserById($userId)
        );
        foreach ($teams as $team) {
            $stats[$team->id]['team_name'] = $team->team_name;
            $stats[$team->id]['total'] = $this->voteRepository->getTotalNumberVotes($team->id, "all");
            $stats[$team->id]['positive'] = $this->voteRepository->getTotalNumberVotes($team->id, "positive");
            $stats[$team->id]['neutral'] = $this->voteRepository->getTotalNumberVotes($team->id, "neutral");
            $stats[$team->id]['negative'] = $this->voteRepository->getTotalNumberVotes($team->id, "negative");
        }

        return $stats;
    }

    public function getVotesPositive($userId)
    {
        // percentage of votes that are positive

        $stats = [];

        $teams = $this->usersRepository->getTeamsForUser(
            $this->usersRepository->getUserById($userId)
        );
        foreach ($teams as $team) {
            $stats[$team->id]['team_name'] = $team->team_name;
            $stats[$team->id]['total'] = $this->voteRepository->getTotalNumberVotes($team->id, "all");
            $total = ($stats[$team->id]['total'] > 0) ? $stats[$team->id]['total'] : 1;
            $stats[$team->id]['percentage'] = ceil(($this->voteRepository->getTotalNumberVotes($team->id, "positive") / $total) * 100 );
        }

        return $stats;
    }

    public function getVotesNegative($userId)
    {
        $stats = [];

        $teams = $this->usersRepository->getTeamsForUser(
            $this->usersRepository->getUserById($userId)
        );
        foreach ($teams as $team) {
            $stats[$team->id]['team_name'] = $team->team_name;
            $stats[$team->id]['total'] = $this->voteRepository->getTotalNumberVotes($team->id, "all");
            $total = ($stats[$team->id]['total'] > 0) ? $stats[$team->id]['total'] : 1;
            $stats[$team->id]['percentage'] = ceil(($this->voteRepository->getTotalNumberVotes($team->id, "negative") / $total) * 100 );
        }

        return $stats;
    }

    public function getVotesNeutral($userId)
    {
        $stats = [];

        $teams = $this->usersRepository->getTeamsForUser(
            $this->usersRepository->getUserById($userId)
        );
        foreach ($teams as $team) {
            $stats[$team->id]['team_name'] = $team->team_name;
            $stats[$team->id]['total'] = $this->voteRepository->getTotalNumberVotes($team->id, "all");
            $total = ($stats[$team->id]['total'] > 0) ? $stats[$team->id]['total'] : 1;
            $stats[$team->id]['percentage'] = ceil(($this->voteRepository->getTotalNumberVotes($team->id, "neutral") / $total) * 100 );
        }

        return $stats;
    }

    public function getRank($orgId = null)
    {

        $teamManagers = $this->usersRepository->getAllTeamManagers($orgId);
        $managersVotedFor = $this->voteRepository->getManagersVotedFor($teamManagers);

        return $managersVotedFor;
    }

    public function getMost($userId, $type = "positive")
    {

    }

    public function getRadar($userId)
    {
        $teams = $this->usersRepository->getTeamsForUser(
            $this->usersRepository->getUserById($userId)
        );

        $stats = [];

        foreach ($teams as $team) {
            $criteria = $this->criteriaRepository->getAllCriteria();
            foreach ($criteria as $criterion) {
                $stats[$team->id][$criterion->criterion]['total'] = $this->voteRepository->getTotalNumberVotes($team->id, "all", $criterion->id);
                $stats[$team->id][$criterion->criterion]['positive'] = ceil(($this->voteRepository->getTotalNumberVotes($team->id, "positive", $criterion->id) / $stats[$team->id][$criterion->criterion]['total']) * 100);

            }
        }
        return $stats;
    }
}