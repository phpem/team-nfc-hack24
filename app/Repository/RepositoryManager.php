<?php

namespace Teamnfc\Repository;

use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Connection;


class RepositoryManager {

    /**
     * @var Connection
     */
    protected $db;

    public function __construct(DatabaseManager $db)
    {
        $this->db = $db;
    }
}