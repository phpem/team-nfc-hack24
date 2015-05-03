<?php

namespace Teamnfc\Repository;

use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Teamnfc\Entity\VoteEntity;

/**
 * VoteRepository
 */
final class VoteRepository
{
    /**
     * @var Connection
     */
    private $db;

    /**
     * @param DatabaseManager $db
     */
    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    /**
     * @param VoteEntity $vote
     */
    public function save(VoteEntity $vote) {
        $this->db->insert('insert into votes (criteria_id, score, team_id, user_id, created_at, updated_at) values (?, ?, ?, ?, ?, ?)',
            [
                $vote->criteria_id,
                $vote->score,
                $vote->team_id,
                $vote->user_id,
                $vote->created_at->format('Y-m-d H:i:s'),
                $vote->updated_at->format('Y-m-d H:i:s')
            ]);
    }
}