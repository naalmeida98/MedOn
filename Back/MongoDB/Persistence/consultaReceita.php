
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
    private $id_receita;
    private $id_consulta;
	
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
        $this->id_consulta = $receita->__get('id_consulta');
        $this->id_receita = $receita->__get('id_receita');
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
            $this->id_consulta = $collectionConsulta->insertOne($docConsulta);
            $this->id_consulta = (string) $this->id_consulta->getInsertedId();

            $docReceita = (array(
                            'id_consulta' => $this->id_consulta,
                            'data' => $this->data,
                            'remedio' => $this->remedio,
                            'dosagem' => $this->dosagem,
                            'tempo' => $this->tempo,
                            'obs_receita' => $this->obs_receita));
            
            $collectionReceita = $this->conexao->selectCollection('receita');
            $this->id_receita = $collectionReceita->insertOne($docReceita);

            header('Location: ../src/cadastroConsultaReceita.php?consultacadastrada=1');
        }else{
            header('Location: ../src/cadastroConsultaReceita.php?pacienteinexistente=1');
        }
	}

    public function excluirConsultaReceita(){
        if (!isset($_SESSION)) {
            session_start();
        }

        $collectionPaciente = $this->conexao->selectCollection('paciente');
		$qtd = $collectionPaciente->count(['cpf' => $this->cpf_paciente]);

		if($qtd == 1){
            
            $collectionConsulta = $this->conexao->selectCollection('consulta');
            $this->id_consulta = (string)$this->id_consulta['_id']->__toString();	
            $collectionConsulta->deleteOne(['_id' => $this->id_consulta]);

            $collectionReceita = $this->conexao->selectCollection('receita');
            $this->id_receita = (string)$this->id_receita['_id']->__toString();	
            $collectionReceita->deleteOne(['_id' => $this->id_receita]);
            

            header('Location: ../src/pesquisa.php?excluido=1');
        }else{
            header('Location: ../src/pesquisa.php?erro=1');
        }

    }


}?>
