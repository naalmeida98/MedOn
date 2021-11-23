
<?php

require_once '../../../../MedOn/Back/Cassandra/cassandra.php';
require_once '../../../../MedOn/Back/Cassandra/conexao.php';
require_once '../../../../MedOn/lib/php-cassandra.php';


class Serviços_consultaReceita
{

    private $cpf_paciente;
    private $data;
    private $diagnostico;
    private $obs_consulta;
    private $remedio;
    private $dosagem;
    private $tempo;
    private $obs_receita;

    public function __construct(Conexao $conexao, Consulta $consulta, Receita $receita)
    {
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

    public function inserirConsultaReceita()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $collectionPaciente = $this->conexao->querySync('SELECT * FROM "paciente" WHERE "cpf" = :cpf ', ['cpf' => $this->cpf_paciente], null, ['names_for_values' => true]);
        $qtd = count((array)$collectionPaciente->fetchAll());

        if ($qtd == 1) {
            $docConsulta = [
                'cpf_paciente' => $this->cpf_paciente,
                'data' => $this->data,
                'diagnostico' => $this->diagnostico,
                'obs_consulta' => $this->obs_consulta,
                'crm_medico' => $_SESSION["crm_medico"]
            ];

            $docReceita = [
                'cpf_paciente' => $this->cpf_paciente,
                'data' => $this->data,
                'remedio' => $this->remedio,
                'dosagem' => $this->dosagem,
                'tempo' => $this->tempo,
                'obs_receita' => $this->obs_receita
            ];

            $cqlConsulta = 'INSERT INTO "consulta" ("cpf_paciente", "data", "diagnostico", "obs_consulta", "crm_medico") 
            VALUES (:cpf_paciente, :data, :diagnostico, :obs_consulta, :crm_medico)';
            $cqlReceita = 'INSERT INTO "receita" ("cpf_paciente", "data", "remedio", "dosagem", "tempo", "obs_receita") 
            VALUES (:cpf_paciente, :data, :remedio, :dosagem, :tempo, :obs_receita)';

            $this->conexao->querySync($cqlConsulta, $docConsulta, null, ['names_for_values' => true]);
            $this->conexao->querySync($cqlReceita, $docReceita, null, ['names_for_values' => true]);

            header('Location: ../src/cadastroConsultaReceita.php?consultacadastrada=1');
        } else {
            header('Location: ../src/cadastroConsultaReceita.php?pacienteinexistente=1');
        }
    }
} ?>
