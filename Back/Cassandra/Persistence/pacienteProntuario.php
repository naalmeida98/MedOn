
<?php

require_once '../../../../MedOn/Back/Cassandra/cassandra.php';
require_once '../../../../MedOn/Back/Cassandra/conexao.php';
require_once '../../../../MedOn/lib/php-cassandra.php';

class Serviços_pacienteProntuario
{

    private $nome;
    private $cpf;
    private $data_nascimento;
    private $problemas;
    private $medicacoes;
    private $alergias;
    private $cirurgias;

    public function __construct(Conexao $conexao, Paciente $paciente, Prontuario $prontuario)
    {
        $this->conexao = $conexao->conectar();
        $this->nome = $paciente->__get('nome');
        $this->cpf = $paciente->__get('cpf');
        $this->data_nascimento = $paciente->__get('data_nascimento');
        $this->problemas = $prontuario->__get('problemas');
        $this->medicacoes = $prontuario->__get('medicacoes');
        $this->alergias = $prontuario->__get('alergias');
        $this->cirurgias = $prontuario->__get('cirurgias');
    }

    public function inserirPacienteProntuario()
    {

        $docPaciente = [
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'data_nascimento' => $this->data_nascimento,
            'crm_medico' => $_SESSION["crm_medico"]
        ];

        $collectionPaciente = $this->conexao->querySync('SELECT * FROM "paciente" WHERE "cpf" = :cpf ', ['cpf' => $this->cpf], null, ['names_for_values' => true]);
        $qtd = count((array)$collectionPaciente->fetchAll());

        if ($qtd == 1) {
            header('Location: ../src/cadastroPaciente.php?pacienteexistente=1');
        } else {
            if (!isset($_SESSION)) {
                session_start();
            }

            $docProntuario = [
                'cpf_paciente' => $this->cpf,
                'problemas' => $this->problemas,
                'medicacoes' => $this->medicacoes,
                'alergias' => $this->alergias,
                'cirurgias' => $this->cirurgias,
                'crm_medico' => $_SESSION["crm_medico"]
            ];

            $cqlPaciente = 'INSERT INTO "paciente" ("nome", "cpf", "data_nascimento", "crm_medico") 
            VALUES (:nome, :cpf, :data_nascimento, :crm_medico)';
            $cqlProntuario = 'INSERT INTO "prontuario" ("cpf_paciente", "problemas", "medicacoes", "alergias", "cirurgias", "crm_medico") 
            VALUES (:cpf_paciente, :problemas, :medicacoes, :alergias, :cirurgias, :crm_medico)';

            $this->conexao->querySync($cqlPaciente, $docPaciente, null, ['names_for_values' => true]);
            $this->conexao->querySync($cqlProntuario, $docProntuario, null, ['names_for_values' => true]);

            header('Location: ../src/cadastroPacienteProntuario.php?pessoacadastrada=1');
        }
    }

    public function logar()
    {
        if (!isset($_SESSION)) {
            session_start();
        };

        $collection = $this->conexao->querySync('SELECT * FROM "paciente" WHERE "crm_medico" = :crm_medico ', ['crm_medico' => $this->crm_medico], null, ['names_for_values' => true]);
        $paciente = (array)$collection->fetchAll();
        $qtd = count($paciente);

        if ($qtd == 1) {
            if ($paciente[0]['senha'] != $this->senha) {
                header('Location: ../src/index.php?loginnegado=1');
            } else {
                $_SESSION["nome_médico"] = $paciente[0]['nome'];
                header('Location: ../src/home.php');
            }
        } else {
            header('Location: ../src/index.php?loginnegado=1');
        }
    }
} ?>
