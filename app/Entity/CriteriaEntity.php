<?php

namespace Teamnfc\Entity;


class CriteriaEntity extends EntityAbstract {

    public $id;
    public $criterion;
    public $weight;
    public $org_id;
    public $created_at;
    public $updated_at;

    public function __construct($id, $criterion, $weight, $org_id, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->criterion = $criterion;
        $this->weight = $weight;
        $this->org_id = $org_id;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public static function populate(array $data = [])
    {
        $vars = ['id' => '', 'criterion' => '', 'weight' => '', 'org_id' => '', 'created_at' => '', 'updated_at' => ''];

        $data = array_merge($vars, $data);

        return new self(
            $data['id'], $data['criterion'], $data['weight'],
            $data['org_id'], $data['created_at'],
            $data['updated_at']
        );
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'criterion' => $this->criterion,
            'weight' => $this->weight,
            'org_id' => $this->org_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}