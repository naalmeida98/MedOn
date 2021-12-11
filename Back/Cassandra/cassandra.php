<?php

require_once '../../../../MedOn/lib/php-cassandra.php';

use Cassandra\Connection;

class Cassandra
{
    public static function getConnection()
    {
        return  new Connection(['localhost'], 'medon');
    }
}
