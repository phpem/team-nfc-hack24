<?php

namespace Teamnfc\Entity;


class VoteEntity extends EntityAbstract {

    public $criteria_id;
    public $score;
    public $team_id;
    public $user_id;
    public $created_at;
    public $updated_at;

    public function __construct($criteria_id, $score, $team_id, $user_id, $created_at, $updated_at)
    {
        $this->criteria_id = $criteria_id;
        $this->score = $score;
        $this->team_id = $team_id;
        $this->user_id = $user_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public static function populate(array $data = [])
    {
        $vars = ['criteria_id' => '', 'score' => '', 'team_id' => '', 'user_id' => '', 'created_at' => '', 'updated_at' => ''];

        $data = array_merge($vars, $data);

        return new self(
            $data['criteria_id'],
            $data['score'],
            $data['team_id'],
            $data['user_id'],
            $data['created_at'],
            $data['updated_at']
        );
    }
}