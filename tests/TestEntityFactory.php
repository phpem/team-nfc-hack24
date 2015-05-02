<?php

use Teamnfc\User\UserEntity;
use Teamnfc\Entity\EntityFactory;

class TestEntityFactory extends TestCase {

    public function testGetRightInstanceForUserEntity()
    {
        $data = [
            'id'            => 10,
            'email'         => 'me@somewhere.com',
            'password'      => '',
            'remember_token' => '',
            'created_at'    => '',
            'first_name'    => '',
            'last_name'     => ''
        ];

        $userEntity = EntityFactory::get('Teamnfc\\User\\UserEntity', $data);

        //print_r($userEntity);
        $this->assertInstanceOf('Teamnfc\\User\\UserEntity', $userEntity);
    }

    /**
     * @expectedException Exception
     */
    public function testEntityNotFoundThrowsException()
    {
        $userEntity = EntityFactory::get('Teamnfc\\User\\FakeStuFF', []);
    }
}