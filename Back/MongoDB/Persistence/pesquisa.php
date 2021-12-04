
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
	}
		
	public function pesquisar(){                 
		
		$collectionPaciente = $this->conexao->selectCollection('paciente');
        
		$qtd = $collectionPaciente->count(['cpf' => $this->cpf]);

		if($qtd == 0){
			return null;
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
			// $docConsulta = $collectionConsulta->find(['cpf_paciente' => $this->cpf]);
			// print_r($docConsulta);
			
			// $cit = new CachingIterator($docConsulta);

			$docConsulta = $collectionConsulta->find(['cpf_paciente' => $this->cpf]);
			$consulta=array();
			$i=0;
			foreach ($docConsulta as $doc) {
				$consulta[]=$doc;
				$id_consulta = (string)$doc['_id']->__toString();
				$docReceita[$i] = $collectionReceita->findOne(['id_consulta' => $id_consulta]);
				//print_r($docReceita[$i]);
				$i++;
			}

			//print_r($consulta);
			
			$doc[0] = $docPaciente;
			$doc[1] = $docProntuario;
			$doc[2] = $consulta;
			$doc[3] = $docReceita;
			$doc[4] = $qtd; //quantidade de consultas registradas

			return $doc;		
		}
	}

}?>
