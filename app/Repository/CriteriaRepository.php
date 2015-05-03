<?php

namespace Teamnfc\Repository;

use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Teamnfc\Entity\CriteriaEntity;
use Teamnfc\Entity\EntityFactory;

/**
 * CriteriaRepository
 */
final class CriteriaRepository extends RepositoryManager
{
    public function getAllCriteria()
    {
        $criteria = [];
        $result = $this->db->table('criteria')->get();

        foreach ($result as $data) {
            $criteria[] = EntityFactory::get('CriteriaEntity', (array)$data);
        }

        return $criteria;
    }
}