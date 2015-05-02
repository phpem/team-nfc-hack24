<?php

namespace Teamnfc\Voting;

use Teamnfc\Repository\Users;

class Team {

    protected $teams = [];
    /**
     * @var UsersEntity[]
     */
    protected $users = [];

    /**
     * @var UsersEntity
     */
    protected $manager;

    /**
     * @var Users
     */
    protected $repository;

    public function __construct(Users $repository)
    {
        $this->repository = $repository;
    }

    protected function getTeamsForUser($user)
    {
        return $this->repository->getTeamsForUser($user);
    }

    protected function getUsersByIds($userIDs)
    {
        return $this->repository->getUsersByIds($userIDs);
    }

    protected function getManagerById($managerID)
    {
        return $this->repository->getUserById($managerID);
    }

    public function loadUsers($user)
    {
        $this->teams = $this->getTeamsForUser($user);

        $userIDs = [];
        $managerID = null;

        foreach ($this->teams->getUsers() as $teamUser) {
            if ($teamUser->isManager()) {
                $managerID = $teamUser->user_id;
            } else {
                $userIDs[] = $teamUser->user_id;
            }
        }

        $this->users = $this->getUsersByIds(implode(',',$userIDs));
        $this->manager = $this->getManagerById($managerID);
    }

    public function getUsers()
    {
        return $this->users;
    }

    public function getManager()
    {
        return $this->manager;
    }


}