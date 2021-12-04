
<?php

require_once '../../../../MedOn/Back/Cassandra/cassandra.php';
require_once '../../../../MedOn/Back/Cassandra/conexao.php';
// require_once '../../../../MedOn/Back/Cassandra/gerar_uuid.php';
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
    private $id_consulta;

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
        $this->id_consulta = $consulta->__get('id_consulta');
    }

    public function inserirConsultaReceita()
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        $collectionPaciente = $this->conexao->querySync('SELECT * FROM "paciente" WHERE "cpf" = :cpf ', ['cpf' => $this->cpf_paciente], null, ['names_for_values' => true]);
        $qtd = count((array)$collectionPaciente->fetchAll());

        if ($qtd == 1) {

            $collectionConsulta = $this->conexao->querySync('SELECT * FROM "consulta" ', [], null, ['names_for_values' => true]);
            $qtd = count((array)$collectionConsulta->fetchAll());

            $id_consulta = $qtd + 1;

            $docConsulta = [
                'cpf_paciente' => $this->cpf_paciente,
                'data' => $this->data,
                'diagnostico' => $this->diagnostico,
                'obs_consulta' => $this->obs_consulta,
                'nome_medico' => $_SESSION["nome_medico"],
                'id_consulta' => $id_consulta
            ];

            $docReceita = [
                'id_consulta' => $id_consulta,
                'data' => $this->data,
                'remedio' => $this->remedio,
                'dosagem' => $this->dosagem,
                'tempo' => $this->tempo,
                'obs_receita' => $this->obs_receita
            ];

            $cqlConsulta = 'INSERT INTO "consulta" ("cpf_paciente", "data", "diagnostico", "obs_consulta", "nome_medico", "id_consulta") 
            VALUES (:cpf_paciente, :data, :diagnostico, :obs_consulta, :nome_medico, :id_consulta)';
            $cqlReceita = 'INSERT INTO "receita" ("id_consulta", "data", "remedio", "dosagem", "tempo", "obs_receita") 
            VALUES (:id_consulta, :data, :remedio, :dosagem, :tempo, :obs_receita)';

            $this->conexao->querySync($cqlConsulta, $docConsulta, null, ['names_for_values' => true]);
            $this->conexao->querySync($cqlReceita, $docReceita, null, ['names_for_values' => true]);

            header('Location: ../src/cadastroConsultaReceita.php?consultacadastrada=1');
        } else {
            header('Location: ../src/cadastroConsultaReceita.php?pacienteinexistente=1');
        }
    }

    public function excluirConsultaReceita(int $id)
    {
        if (!isset($_SESSION)) {
            session_start();
        }

        echo "\n<br />\n<br />CPF: ";
        print_r(($_SESSION["cpf_paciente"]));

        $collectionConsulta = $this->conexao->querySync('SELECT * FROM "consulta" WHERE "cpf_paciente" = :cpf_paciente ', ['cpf_paciente' => $_SESSION["cpf_paciente"]], null, ['names_for_values' => true]);
        $consulta = (array)$collectionConsulta->fetchAll();
        $qtd = count($consulta);

        echo "\n<br />\n<br />Consulta: ";
        print_r(($consulta));

        for ($i = 0; $i < $qtd; $i++) {
            $docConsulta[$i] = $consulta[$i];
            $id_consulta = $docConsulta[$i]['id_consulta'];
            $collectionReceita = $this->conexao->querySync('SELECT * FROM "receita" WHERE "id_consulta" = :id_consulta ', ['id_consulta' => $id_consulta], null, ['names_for_values' => true]);
            $receita = (array)$collectionReceita->fetchAll();
            $docReceita[$i] = $receita;
        }
        echo "\n<br />\n<br />";
        echo $id;
        $id_consulta = $docConsulta[$id]['id_consulta'];
        echo "\n<br />\n<br />Consulta: ";
        print_r($docConsulta[$id]);
        echo "\n<br />\n<br />ID Consulta: ";
        print_r($id_consulta);
        try {
            $cqlConsultaDelete = 'DELETE FROM "consulta" WHERE "cpf_paciente" = :cpf_paciente AND "id_consulta" = :id_consulta';
            $this->conexao->querySync($cqlConsultaDelete, ['cpf_paciente' => $_SESSION["cpf_paciente"], 'id_consulta' => 1], null, ['names_for_values' => true]);
            $cqlReceitaDelete = 'DELETE FROM "receita" WHERE "id_consulta" = :id_consulta';
            $this->conexao->querySync($cqlReceitaDelete, ['id_consulta' => 1], null, ['names_for_values' => true]);
        } catch (Exception $e) {
            echo $e;
        }
        // header('Location: ../src/pesquisa.php?pesquisar=$_SESSION["cpf_paciente"]');
    }
} ?>
