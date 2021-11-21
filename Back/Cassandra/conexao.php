

<?php

require_once '../../../../MedOn/Back/Cassandra/cassandra.php';
require_once '../../../../MedOn/lib/php-cassandra.php';

use Cassandra\Exception;
use Cassandra\Type\Timestamp;
use Cassandra\Connection;
use Cassandra\Response\Result;

class Conexao
{
	private $connection;


	public function conectar()
	{
		try {

			// $cassandraDAO = new CassandraDAO();

			$this->connection = Cassandra::getConnection();

			try {
				//CONSULTA

				$result = $this->connection->querySync('SELECT * FROM "paciente"', [], null, ['names_for_values' => true]);
				$employees = (array)$result->fetchAll();
				print_r($employees);
				//echo $employees;

				// usort($employees, function ($a, $b) {
				// 	return $a['name'] >= $b['name'];
				// });

				//INSERIR
				// $cql = 'INSERT INTO "paciente" ("cpf", "datanasc", "nome") 
				// VALUES (:cpf, :datanasc, :nome)';

				// $paciente = [
				// 	'cpf' => '12457965321',
				// 	'datanasc' => null,
				// 	'nome' => 'Maria',
				// ];

				// $this->connection->querySync($cql, $paciente, null, ['names_for_values' => true]);
			} catch (Cassandra\Exception $e) {
				echo $e;
			}

			// $future    = $this->connection->executeAsync($statement);


			// $result = $this->connection->executeSync('SELECT * FROM "usuario"');
			// $employees = (array)$result->fetchAll();
			// echo $result;


			// usort($employees, function($a, $b) {
			// 	return $a['name'] >= $b['name'];
			// });

			// return $employees;


			// echo $employees;

			// PreparedStatement $ps = session.prepare(
			// 	"BEGIN BATCH" +    
			// 	"INSERT INTO messages (user_id, msg_id, title, body) VALUES (?, ?, ?, ?);" +    
			// 	"INSERT INTO messages (user_id, msg_id, title, body) VALUES (?, ?, ?, ?);" +    
			// 	"INSERT INTO messages (user_id, msg_id, title, body) VALUES (?, ?, ?, ?);" +    
			// 	"APPLY BATCH" ); 

			// 	session.execute(ps.bind(uid, mid1, title1, body1, uid, mid2, title2, body2, uid, mid3, title3, body3));


		} catch (Exception $e) {
			echo $e;
		}
	}
}
