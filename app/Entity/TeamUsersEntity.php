<?php

namespace Teamnfc\Entity;


use Teamnfc\Entity\EntityAbstract;

class TeamUsersEntity extends EntityAbstract {

    public $team_id;
    public $user_id;
    public $is_manager;
    public $created_at;
    public $updated_at;

    public function __construct($team_id, $user_id, $is_manager, $created_at, $updated_at)
    {
        $this->team_id  = $team_id;
        $this->user_id  = $user_id;
        $this->is_manager = $is_manager;
        $this->created_at   = $created_at;
        $this->updated_at   = $updated_at;
    }

    public static function populate(array $data = [])
    {
        $vars = ['team_id' => '', 'user_id' => '', 'is_manager' => '', 'created_at' => '', 'updated_at' => ''];

        $data = array_merge($vars, $data);

        return new self(
            $data['team_id'], $data['user_id'], $data['is_manager'],
            $data['created_at'], $data['updated_at']
        );
    }

    public function isManager()
    {
        return (bool)$this->is_manager;
    }

    public function toArray()
    {
        return [
            'team_id' => $this->team_id,
            'user_id' => $this->user_id,
            'is_manager' => $this->is_manager,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}