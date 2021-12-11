

<?php

require_once '../../../../MedOn/Back/Cassandra/cassandra.php';
require_once '../../../../MedOn/lib/php-cassandra.php';

use Cassandra\Exception;

class Conexao
{
	private $connection;


	public function conectar()
	{
		try {

			$this->connection = Cassandra::getConnection();

			return $this->connection;
		} catch (Exception $e) {
			echo $e;
		}
	}
}
