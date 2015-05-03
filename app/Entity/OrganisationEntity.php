<?php

namespace Teamnfc\Entity;


class OrganisationEntity extends EntityAbstract {

    public $id;
    public $org_name;
    public $created_at;
    public $updated_at;

    public function __construct($id, $org_name, $created_at, $updated_at)
    {
        $this->id = $id;
        $this->org_name = $org_name;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
    }

    public static function populate(array $data = [])
    {
        $vars = ['id' => '', 'org_name' => '', 'created_at' => '', 'updated_at' => ''];

        $data = array_merge($vars, $data);

        return new self(
            $data['id'], $data['org_name'], $data['created_at'], $data['updated_at']
        );
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'org_name' => $this->org_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}