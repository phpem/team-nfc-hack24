<?php

namespace Teamnfc\Repository;

use Teamnfc\Entity\CriteriaEntity;

/**
 * CriteriaRepository
 */
final class CriteriaRepository
{
    private $criteria;

    public function __construct()
    {
        $this->criteria = [
            new CriteriaEntity(1, 'Meeting planning', 1, 0, new \DateTime(), new \DateTime()),
            new CriteriaEntity(2, 'Attendance / Punctuality', 1, 0, new \DateTime(), new \DateTime()),
        ];
    }

    public function getAllCriteria()
    {
        return $this->criteria;
    }
}