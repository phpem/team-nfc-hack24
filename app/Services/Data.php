<?php
/**
 * Created by PhpStorm.
 * User: jamesh
 * Date: 03/05/2015
 * Time: 01:14
 */

namespace Teamnfc\Services;


use Teamnfc\Repository\UsersRepository;
use Teamnfc\Repository\TeamRepository;
use Teamnfc\Repository\CriteriaRepository;

class Data {

    protected $usersRepository;
    protected $teamRepository;
    protected $criteriaRepository;

    public function __construct(UsersRepository $usersRepository, TeamRepository $teamRepository, CriteriaRepository $criteriaRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->teamRepository = $teamRepository;
        $this->criteriaRepository = $criteriaRepository;
    }

    public function getData($userId, $criteria = null, $scope = null, $type = null)
    {
        $this->getOverall($userId, $criteria);
        $this->getPositive($userId);
        $this->getNegative($userId);
        $this->getRank($userId, $scope);
        $this->getMost($userId, $type);
    }

    public function getOverall($userId, $criteria = null)
    {



    }

    public function getPositive($userId)
    {

    }

    public function getNegative($userId)
    {

    }

    public function getRank($userId, $scope = "organisation")
    {

    }

    public function getMost($userId, $type = "positive")
    {

    }
}