<?php

namespace Teamnfc\Repository;

use Teamnfc\Entity\VoteEntity;
use Teamnfc\Repository\RepositoryManager;

/**
 * VoteRepository
 */
final class VoteRepository extends RepositoryManager
{
    /**
     * @param VoteEntity $vote
     */
    public function save(VoteEntity $vote)
    {
        $this->db->table('votes')->insert($vote->toArray());
    }

    public function getTotalMembersVoted($teamId)
    {
        return $this->db->table('votes')->where('team_id', '=', $teamId)->groupBy('user_id')->count();
    }

    public function getTotalNumberVotes($teamId)
    {
        return $this->db->table('votes')->where('team_id', '=', $teamId)->count();
    }

    public function getTotalNumberPositive($teamId)
    {
        return $this->db->table('votes')->where('team_id', '=', $teamId)->where('score', '>=', 4)->count();
    }

    public function getTotalNumberNegative($teamId)
    {
        return $this->db->table('votes')->where('team_id', '=', $teamId)->where('score', '<=', 2)->count();
    }

    public function getTotalNumberNeutral($teamId)
    {
        return $this->db->table('votes')->where('team_id', '=', $teamId)->where('score', '=', 3)->count();
    }
}