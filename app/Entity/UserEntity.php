<?php

namespace Teamnfc\Entity;

use Teamnfc\Entity\EntityAbstract;
use Teamnfc\Entity\EntityFactory;

class UserEntity extends EntityFactory
{
    public $id;
    public $email;
    public $password;
    public $remember_token;
    public $created_at;
    public $first_name;
    public $last_name;

    public function __construct($id = null, $email = null, $password = null, $remember_token = null, $created_at = null,
        $fist_name = null, $last_name = null)
    {
        $this->id           = $id;
        $this->email        = $email;
        $this->password     = $password;
        $this->remember_token = $remember_token;
        $this->created_at   = $created_at;
        $this->first_name   = $fist_name;
        $this->last_name    = $last_name;
    }

    public static function populate(array $data = [])
    {
        $vars = [
            'id' => '', 'email' => '', 'password' => '', 'remember_token' => '', 'created_at' => '',
            'first_name' => '', 'last_name' => ''
        ];

        $data = array_merge($vars, $data);

        return new self(
            $data['id'], $data['email'], $data['password'],
            $data['remember_token'], $data['created_at'],
            $data['first_name'], $data['last_name']
        );
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'email' => $this->email,
            'password' => $this->password,
            'remember_token' => $this->remember_token,
            'created_at' => $this->created_at,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name
        ];
    }
}