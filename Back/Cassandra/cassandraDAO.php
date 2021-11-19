<?php

require_once './conexao.php';

use Cassandra\Exception;
use Cassandra\Type\Timestamp;

class CassandraDAO
{
    /**
     * @var \Cassandra\Connection
     */
    private $connection;

    public function __construct()
    {
        $this->connection = Cassandra::getConnection();
    }
}
