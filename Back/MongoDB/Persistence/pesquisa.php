
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
			return -1;
		}else{
            if (!isset($_SESSION)) {
                session_start();
            }

            $collectionProntuario = $this->conexao->selectCollection('prontuario');
            $collectionConsulta = $this->conexao->selectCollection('consulta');
            $collectionReceita = $this->conexao->selectCollection('receita');

            $docPaciente = $collectionPaciente->findOne(['cpf' => $this->cpf]);
            $docProntuario = $collectionProntuario->findOne(['cpf_paciente' => $this->cpf]);

			// print_r($docPaciente);
			// print_r($docProntuario);

			$qtd = $collectionConsulta->count(['cpf_paciente' => $this->cpf]);

            for($i=0; $i<$qtd; $i++){
				$docConsulta[$i] = $collectionConsulta->findOne(['cpf_paciente' => $this->cpf]);
				//print_r($docConsulta[$i]);
				$id_consulta = (string)$docConsulta[$i]['_id']->__toString();
				// echo $id_consulta;
                $docReceita[$i] = $collectionReceita->findOne(['id_consulta' => $id_consulta]);
				//print_r($docReceita[$i]);
            }
			
			$doc[0] = $docPaciente;
			$doc[1] = $docProntuario;
			$doc[2] = $docConsulta;
			$doc[3] = $docReceita;
			$doc[4] = $qtd; //quantidade de consultas registradas

			// echo "passou aqui 1";

			//print_r($doc);
			return $doc;		
		}
	}

}?>
