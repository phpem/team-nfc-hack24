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


    public function getData()
    {
        $this->getOverall();
        $this->getPositive();
        $this->getNegative();
        $this->getRank();
        $this->getMost();
    }

    public function getOverall($criteria = null)
    {



    }

    public function getPositive()
    {

    }

    public function getNegative()
    {

    }

    public function getRank($scope = "organisation")
    {

    }

    public function getMost($type = "positive")
    {

    }
}