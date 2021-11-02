<?php

class Conexao{

	private $host = 'localhost';
	private $dbname = 'MedOn';
	private $user = 'mongodb';
	private $pass = '1234';

	public function conectar() {
		try {
			$conexao = new PDO(
				"mongodb:host=$this->host;dbname=$this->dbname",
				"$this->user",
				"$this->pass"				
			);
			return $conexao;
		} catch (PDOException $e) {
			echo '<p>'.$e->getMessage().'</p>';
			print("ERRO DE CONEXÃO");
		}
	}
}

?>