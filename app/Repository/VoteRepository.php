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

    public function getTotalNumberVotes($teamId, $type = 'positive', $criteriaId = null)
    {
        $query = $this->db->table('votes')->where('team_id', '=', $teamId);

        if(!is_null($criteriaId))
        {
            $query->where('criteria_id', '=', $criteriaId);
        }

        switch($type)  {
            case 'positive':
                $query->where('score', '>=', 4);
                break;
            case 'neutral':
                $query->where('score', '>=', 4);
                break;
            case 'negative':
                $query->where('score', '>=', 4);
                break;
            default:
                break;
        }
        return $query->count();
    }

    public function getTotalNumberPositive($teamId, $criteriaId = null)
    {
        return $this->db->table('votes')->where('team_id', '=', $teamId)->where('score', '>=', 4)->count();
    }

    public function getTotalNumberNegative($teamId,  $criteriaId = null)
    {
        return $this->db->table('votes')->where('team_id', '=', $teamId)->where('score', '<=', 2)->count();
    }

    public function getTotalNumberNeutral($teamId, $criteriaId = null)
    {
        return $this->db->table('votes')->where('team_id', '=', $teamId)->where('score', '=', 3)->count();
    }


}