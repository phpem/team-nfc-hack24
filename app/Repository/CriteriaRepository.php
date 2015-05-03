<?php

namespace Teamnfc\Repository;

use Illuminate\Database\Connection;
use Illuminate\Database\DatabaseManager;
use Teamnfc\Entity\CriteriaEntity;
use Teamnfc\Entity\EntityFactory;

/**
 * CriteriaRepository
 */
final class CriteriaRepository
{
    /**
     * @var Connection
     */
    private $db;

    /**
     * @param DatabaseManager $db
     */
    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }

    public function getAllCriteria()
    {
        $criteria = [];
        $result = $this->db->table('criteria')->get();

        foreach ($result as $data) {
            $criteria[] = EntityFactory::get('CriteriaEntity', (array)$data);
        }

        return $criteria;
    }

    public function getCriteriaForID($id)
    {
        $result = $this->db->table('criteria')->where('id', $id);
        $criteria = EntityFactory::get('CriteriaEntity', $result);
        return $criteria;
    }
}