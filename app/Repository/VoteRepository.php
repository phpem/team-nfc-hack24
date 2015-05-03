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
        $this->db->table('votes')
            ->where('team_id', $vote->team_id)
            ->where('user_id', $vote->user_id)
            ->where('criteria_id', $vote->criteria_id)->delete();

        $this->db->table('votes')->insert($vote->toArray());
    }

    public function getTotalMembersVoted($teamId)
    {
        return $this->db->table('votes')->where('team_id', '=', $teamId)->groupBy('user_id')->count();
    }

    public function getManagersVotedFor(array $teamManagers)
    {

        $managerIDs = [];
        foreach ($teamManagers as $manager) {
            $managerIDs[] = (int)$manager->id;
        }

        return $this->db->table('votes')->whereIn('user_id', $managerIDs)->get();
    }

    public function getTotalNumberVotes($teamId, $type = 'all', $criteriaId = null)
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
                $query->where('score', '=', 3);
                break;
            case 'negative':
                $query->where('score', '<=', 2);
                break;
            default:
                break;
        }
        return $query->count();
    }

    public function getTotalNumberPositive($teamId, $criteriaId = null)
    {
        return $this->getTotalNumberVotes($teamId, "positive", $criteriaId);
    }

    public function getTotalNumberNegative($teamId,  $criteriaId = null)
    {
        return $this->getTotalNumberVotes($teamId, "negative", $criteriaId);
    }

    public function getTotalNumberNeutral($teamId, $criteriaId = null)
    {
        return $this->getTotalNumberVotes($teamId, "neutral", $criteriaId);
    }

    public function getTotalCriteriaScore($teamId,  $criteriaId) {
        return $this->db->table('votes')->where('team_id', '=', $teamId)->where('criteria_id',  '=', $criteriaId)->sum('score');
    }

    public function getNumberVotesPerCriteria($teamId, $criteriaId) {
        return $this->db->table('votes')->where('team_id', '=', $teamId)->where('criteria_id',  '=', $criteriaId)->count();
    }

}