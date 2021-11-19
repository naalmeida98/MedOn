

<?php

require './lib/php-cassandra.php';

use Cassandra\Connection;

class Cassandra
{
	public static function getConnection()	{
		return  new Connection(['localhost'], 'MedOn');
	}
}
//require_once '../../../../MedOn/vendor/autoload.php';

//class Conexao
//{
	//public function conectar()
	//{
		//try {

			// $cluster = Cassandra::cluster()->withCredentials("cassandra", "cassandra")->withContactPoints('localhost')->withPort(9042)->build();
			 

			// creating session with cassandra scope by keyspace
			//$session = $cluster->connect($keyspace);

			// if (!$session) {
			// 	echo "Error - Unable to connect to database";
			// }

			//$statement = new Cassandra\SimpleStatement(       // also supports prepared and batch statements
			//	'SELECT * FROM medon.usuario'
			//);
			//$future    = $session->executeAsync($statement);  // fully asynchronous and easy parallel execution
			//$result    = $future->get();                      // wait for the result, with an optional timeout

			//echo $result;

			// foreach ($result as $row) {                       // results and rows implement Iterator, Countable and ArrayAccess
			// 	printf("The keyspace %s has a table called %s\n", $row['keyspace_name'], $row['columnfamily_name']);
			// }
		//} catch (Exception $e) {
		//	echo $e;
		//}
	//}
//}
