
<?php

use MongoDB\Client;

require_once '../../../../MedOn/vendor/autoload.php';

use MongoDB\BulkWriteResult;

class Serviços_usuario{

	private $conexao;
	private $crm;
	private $nome;
	private $data_nascimento;
	private $senha;
	
	public function __construct(Conexao $conexao, Usuario $usuario) { 
		$this->conexao = $conexao->conectar();
		$this->crm = $usuario->__get('crm');
		$this->nome = $usuario->__get('nome');
		$this->data_nascimento = $usuario->__get('data_nascimento');
		$this->senha = $usuario->__get('senha');
	}
		
	public function inserirUsuario(){

		$documents = (array('nome' => $this->nome,
							'crm' => $this->crm,
							'data_nascimento' => $this->data_nascimento,
							'senha' => $this->senha));
		
		$collection = $this->conexao->selectCollection('usuario');

		echo "chegou aqui";
		
		//não está funcionando
		if($collection->find(['crm' => $this->crm])){
			//fazer esse tratamento no FRONT
			// header('Location: ../src/index.php?usuarioexistente=1');
			echo "passou aqui";
		}


		$id = $collection->insertOne($documents);
		//header('Location: ../src/login.php');	
	}

	// public function erro(){
	// 	header('Location: index.php?inputEmBranco=1');
	// }

	public function logar(){
		// try{
		// 	$query = "select U.login, U.nome_familia from usuario U where '$this->login' = U.login and '$this->senha' = U.senha;";
		// 	$stmt = $this->conexao->prepare($query);
		// 	$stmt->execute();
		// 	$cont = count($stmt->fetchAll(PDO::FETCH_NUM)); 

		// 	if($cont == 0){
		// 		header('Location: login.php?loginnegado=1');
		// 	}else if($cont == 1){
		// 		$query = "select U.nome_familia from usuario U where '$this->login' = U.login and '$this->senha' = U.senha;";
		// 		$stmt = $this->conexao->prepare($query);
		// 		$stmt->execute();
		// 		$aux = $stmt->fetchAll(PDO::FETCH_ASSOC);
		// 		if(!isset($_SESSION)){
		// 			session_start();
		// 		};
		// 		$_SESSION["login"] = $this->login;
		// 		$_SESSION["nome_familia"] = $aux[0]['nome_familia'];
		// 		header('Location: pagprincipal.php');}
		// }catch (PDOException $e){
		// 	header('Location: login.php?erro=1');
		// }
	}
}?>
