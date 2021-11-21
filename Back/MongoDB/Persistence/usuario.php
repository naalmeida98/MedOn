
<?php

use MongoDB\Client;
use MongoDB\Driver\Cursor;

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
		$qtd = $collection->count(['crm' => $this->crm]);

		if($qtd == 1){
			header('Location: ../src/cadastroUsuario.php?usuarioexistente=1');
		}else{	
			$id = $collection->insertOne($documents);
			header('Location: ../src/index.php');
		}
	}

	public function logar(){
		if(!isset($_SESSION)){
			session_start();
		};

		$collection = $this->conexao->selectCollection('usuario');
		$qtd = $collection->count(['crm' => $this->crm]);

		if($qtd == 1){
			$usuario = $collection->findOne(['crm' => $this->crm]);
			if($usuario['senha'] != $this->senha){
				header('Location: ../src/index.php?loginnegado=1');
			}else{
				$_SESSION["nome_medico"] = $usuario['nome'];
				$_SESSION["crm_medico"] = $usuario['crm'];
				header('Location: ../src/home.php');
			}	
		}else{	
			header('Location: ../src/index.php?loginnegado=1');
		}		
	}
}?>
