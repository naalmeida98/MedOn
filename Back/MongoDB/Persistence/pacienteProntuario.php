
<?php

use MongoDB\Client;
use MongoDB\Driver\Cursor;

require_once '../../../../MedOn/vendor/autoload.php';

use MongoDB\BulkWriteResult;

class Serviços_pacienteProntuario{
	
	private $nome;
	private $cpf;
	private $data_nascimento;
    private $problemas;
	private $medicacoes;
	private $alergias;
	private $cirurgias;
	
	public function __construct(Conexao $conexao, Paciente $paciente, Prontuario $prontuario) { 
		$this->conexao = $conexao->conectar();
		$this->nome = $paciente->__get('nome');
		$this->cpf = $paciente->__get('cpf');
		$this->data_nascimento = $paciente->__get('data_nascimento');
		$this->problemas = $prontuario->__get('problemas');
        $this->medicacoes = $prontuario->__get('medicacoes');
        $this->alergias = $prontuario->__get('alergias');
        $this->cirurgias = $prontuario->__get('cirurgias');
	}
		
	public function inserirPacienteProntuario(){

		$docPaciente = (array('nome' => $this->nome,
							'cpf' => $this->cpf,
							'data_nascimento' => $this->data_nascimento,
                            'crm_medico' => $_SESSION["crm_medico"]));                   
		
		$collectionPaciente = $this->conexao->selectCollection('paciente');
		$qtd = $collectionPaciente->count(['cpf' => $this->crm]);

		if($qtd == 1){
			header('Location: ../src/cadastroPaciente.php?pacienteexistente=1');
		}else{
            if (!isset($_SESSION)) {
                session_start();
            }

            $docProntuario = (array(
                            'cpf_paciente' => $this->cpf,
                            'problemas' => $this->problemas,
							'medicacoes' => $this->medicacoes,
							'alergias' => $this->alergias,
                            'cirurgias' => $this->cirurgias,
                            'crm_medico' => $_SESSION["crm_medico"]));
            
            $collectionProntuario = $this->conexao->selectCollection('prontuario');
			$id = $collectionPaciente->insertOne($docPaciente);
            $id2 = $collectionProntuario->insertOne($docProntuario);
			header('Location: ../src/cadastroPacienteProntuario.php?pessoacadastrada=1');
		}
	}

	public function logar(){
		if(!isset($_SESSION)){
			session_start();
		};

		$collection = $this->conexao->selectCollection('paciente');
		$qtd = $collection->count(['crm' => $this->crm]);

		if($qtd == 1){
			$paciente = $collection->findOne(['crm' => $this->crm]);
			if($paciente['senha'] != $this->senha){
				header('Location: ../src/index.php?loginnegado=1');
			}else{
				$_SESSION["nome_médico"] = $paciente['nome'];
				header('Location: ../src/home.php');
			}	
		}else{	
			header('Location: ../src/index.php?loginnegado=1');
		}		
	}
}?>
