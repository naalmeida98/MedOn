<?php

require_once '../../../../MedOn/Back/Cassandra/conexao.php';
require_once '../../../../MedOn/Back/Cassandra/cassandra.php';
require_once '../../../../MedOn/lib/php-cassandra.php';

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

    public function getEmployees()
    {
        $result = $this->connection->querySync('SELECT * FROM "employees"');
        // $employees = (array)$result->fetchAll();

        usort($employees, function ($a, $b) {
            return $a['name'] >= $b['name'];
        });

        return $employees;
    }
}
