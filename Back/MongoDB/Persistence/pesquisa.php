
<?php

use MongoDB\Client;
use MongoDB\Driver\Cursor;

require_once '../../../../MedOn/vendor/autoload.php';

use MongoDB\BulkWriteResult;

class Serviços_pesquisa{
	
	private $nome;
	private $cpf;
	private $data_nascimento;
    private $problemas;
	private $medicacoes;
	private $alergias;
	private $cirurgias;
	
	public function __construct(Conexao $conexao, Paciente $paciente) { 
		$this->conexao = $conexao->conectar();
		$this->cpf = $paciente->__get('cpf');
		// $this->data_nascimento = $paciente->__get('data_nascimento');
		// $this->problemas = $prontuario->__get('problemas');
        // $this->medicacoes = $prontuario->__get('medicacoes');
        // $this->alergias = $prontuario->__get('alergias');
        // $this->cirurgias = $prontuario->__get('cirurgias');
	}
		
	public function pesquisar(){                 
		
		$collectionPaciente = $this->conexao->selectCollection('paciente');
        

		$qtd = $collectionPaciente->count(['cpf' => $this->cpf]);

		if($qtd == 0){
            //FAZER ESSE TRATAMENTO NO FRONT
			header('Location: ../src/cadastroPaciente.php?pacienteinexistente=1');
		}else{
            if (!isset($_SESSION)) {
                session_start();
            }

            $collectionProntuario = $this->conexao->selectCollection('prontuario');
            $collectionConsulta = $this->conexao->selectCollection('consulta');
            $collectionReceita = $this->conexao->selectCollection('remedio');

            $docPaciente = $collectionPaciente->findOne(['cpf' => $this->cpf]);
            $docProntuario = $collectionProntuario->find(['cpf_paciente' => $this->cpf]);
            $docConsulta = $collectionConsulta->find(['cpf_paciente' => $this->cpf]);

            print_r($docConsulta);
            // print_r($docPaciente);
            // print_r($docProntuario);

            for($i=0; $i<$collectionReceita->count(); $i++){
                $docReceita[$i] = $collectionReceita->findOne(['id_consulta' => $docConsulta[$i]['_id']]);
                print_r($docReceita[$i]);
            }

            

            

            

            
			
			// header('Location: ../src/cadastroPacienteProntuario.php?pessoacadastrada=1');
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
