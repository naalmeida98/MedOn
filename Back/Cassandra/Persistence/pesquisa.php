
<?php

require_once '../../../../MedOn/Back/Cassandra/cassandra.php';
require_once '../../../../MedOn/Back/Cassandra/conexao.php';
require_once '../../../../MedOn/lib/php-cassandra.php';

class Serviços_pesquisa
{

    private $nome;
    private $cpf;
    private $data_nascimento;
    private $problemas;
    private $medicacoes;
    private $alergias;
    private $cirurgias;


    public function __construct(Conexao $conexao, Paciente $paciente)
    {
        $this->conexao = $conexao->conectar();
        $this->cpf = $paciente->__get('cpf');
    }

    public function pesquisar()
    {

        $collectionPaciente = $this->conexao->querySync('SELECT * FROM "paciente" WHERE "cpf" = :cpf ', ['cpf' => $this->cpf], null, ['names_for_values' => true]);
        $docPaciente = (array)$collectionPaciente->fetchAll();
        $qtd = count($docPaciente);

        if ($qtd == 0) {
            return -1;
        } else {
            if (!isset($_SESSION)) {
                session_start();
            }

            $collectionProntuario = $this->conexao->querySync('SELECT * FROM "prontuario" WHERE "cpf_paciente" = :cpf_paciente ', ['cpf_paciente' => $this->cpf], null, ['names_for_values' => true]);
            $docProntuario = (array)$collectionProntuario->fetchAll();

            $collectionConsulta = $this->conexao->querySync('SELECT * FROM "consulta" WHERE "cpf_paciente" = :cpf_paciente', ['cpf_paciente' => $this->cpf], null, ['names_for_values' => true]);

            $consulta = (array)$collectionConsulta->fetchAll();

            $qtd = count($consulta);

            for ($i = 0; $i < $qtd; $i++) {
                $docConsulta[$i] = $consulta[$i];

                $id_consulta = $docConsulta[$i]['id_consulta'];

                $collectionReceita = $this->conexao->querySync('SELECT * FROM "receita" WHERE "id_consulta" = :id_consulta ', ['id_consulta' => $id_consulta], null, ['names_for_values' => true]);
                $receita = (array)$collectionReceita->fetchAll();
                $docReceita[$i] = $receita[0];
            }

            $doc[0] = $docPaciente[0];
            $doc[1] = $docProntuario[0];
            $doc[2] = $docConsulta;
            $doc[3] = $docReceita;
            $doc[4] = $qtd; //quantidade de consultas registradas

            return $doc;
        }
    }
} ?>
