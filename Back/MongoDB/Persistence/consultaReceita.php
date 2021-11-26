
<?php

use MongoDB\Client;
use MongoDB\Driver\Cursor;

require_once '../../../../MedOn/vendor/autoload.php';

use MongoDB\BulkWriteResult;

class Serviços_consultaReceita{
	
	private $cpf_paciente;
	private $data;
	private $diagnostico;
    private $obs_consulta;
    private $remedio;
	private $dosagem;
    private $tempo;
    private $obs_receita;
	
	public function __construct(Conexao $conexao, Consulta $consulta, Receita $receita) { 
		$this->conexao = $conexao->conectar();
		$this->cpf_paciente = $consulta->__get('cpf_paciente');
		$this->data = $consulta->__get('data');
		$this->diagnostico = $consulta->__get('diagnostico');
		$this->obs_consulta = $consulta->__get('obs_consulta');
        $this->remedio = $receita->__get('remedio');
        $this->dosagem = $receita->__get('dosagem');
        $this->tempo = $receita->__get('tempo');
        $this->obs_receita = $receita->__get('obs_receita');
	}
		
	public function inserirConsultaReceita(){
        if (!isset($_SESSION)) {
            session_start();
        }

        $collectionPaciente = $this->conexao->selectCollection('paciente');
		$qtd = $collectionPaciente->count(['cpf' => $this->cpf_paciente]);

		if($qtd == 1){
            $docConsulta = (array('cpf_paciente' => $this->cpf_paciente,
							'data' => $this->data,
							'diagnostico' => $this->diagnostico,
                            'obs_consulta' => $this->obs_consulta,
                            'nome_medico' => $_SESSION["nome_medico"]));                   
		
            $collectionConsulta = $this->conexao->selectCollection('consulta');		
            $id_consulta = $collectionConsulta->insertOne($docConsulta);
            $id_consulta = (string) $id_consulta->getInsertedId();

            $docReceita = (array(
                            'id_consulta' => $id_consulta,
                            'data' => $this->data,
                            'remedio' => $this->remedio,
                            'dosagem' => $this->dosagem,
                            'tempo' => $this->tempo,
                            'obs_receita' => $this->obs_receita));
            
            $collectionReceita = $this->conexao->selectCollection('receita');
            $id_receita = $collectionReceita->insertOne($docReceita);

            header('Location: ../src/cadastroConsultaReceita.php?consultacadastrada=1');
        }else{
            header('Location: ../src/cadastroConsultaReceita.php?pacienteinexistente=1');
        }
		
		
	}


}?>
