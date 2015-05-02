<?php

namespace Teamnfc\Entity;

use Teamnfc\Entity\EntityAbstract;

class TeamEntity extends EntityAbstract {

    public $id;
    public $team_name;
    public $org_id;
    public $created_at;
    public $updated_at;

    public function __construct($id, $team_name, $org_id, $created_at, $updated_at)
    {
        $this->id           = $id;
        $this->team_name    = $team_name;
        $this->org_id       = $org_id;
        $this->created_at   = $created_at;
        $this->updated_at   = $updated_at;

    }

    public static function populate(array $data = [])
    {
        $vars = ['id' => '', 'team_name' => '', 'org_id' => '', 'created_at' => '', 'updated_at' => ''];

        $data = array_merge($vars, $data);

        return new self(
            $data['id'], $data['team_name'], $data['org_id'],
            $data['created_at'], $data['updated_at']
        );
    }
}