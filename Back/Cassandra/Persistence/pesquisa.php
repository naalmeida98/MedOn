
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
        // $this->data_nascimento = $paciente->__get('data_nascimento');
        // $this->problemas = $prontuario->__get('problemas');
        // $this->medicacoes = $prontuario->__get('medicacoes');
        // $this->alergias = $prontuario->__get('alergias');
        // $this->cirurgias = $prontuario->__get('cirurgias');
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

            // echo 'Paciente: ';
            // print_r($docPaciente);
            // echo "\n<br />\n<br />Prontuario: ";
            // print_r($docProntuario);

            $collectionConsulta = $this->conexao->querySync('SELECT * FROM "consulta" WHERE "cpf_paciente" = :cpf_paciente', ['cpf_paciente' => $this->cpf], null, ['names_for_values' => true]);

            $consulta = (array)$collectionConsulta->fetchAll();
            // echo "\n<br />\n<br />Consulta: ";
            // print_r(($consulta));

            $qtd = count($consulta);

            for ($i = 0; $i < $qtd; $i++) {
                $docConsulta[$i] = $consulta[$i];
                // echo "\n<br />\n<br />Consulta ";
                // print_r($i);
                // echo ':';
                // print_r($docConsulta[$i]);
                $id_consulta = $docConsulta[$i]['id_consulta'];
                // echo "\n<br />\n<br />ID consulta: ";
                // print_r($id_consulta);
                $collectionReceita = $this->conexao->querySync('SELECT * FROM "receita" WHERE "id_consulta" = :id_consulta ', ['id_consulta' => $id_consulta], null, ['names_for_values' => true]);
                $docReceita[$i] = (array)$collectionReceita->fetchAll();
                // echo "\n<br />\n<br />Receita: ";
                // print_r($docReceita[$i]);
            }

            $doc[0] = $docPaciente[0];
            $doc[1] = $docProntuario[0];
            $doc[2] = $docConsulta;
            $doc[3] = $docReceita[0];
            $doc[4] = $qtd; //quantidade de consultas registradas

            // echo "passou aqui 1";
            // echo "\n<br />\n<br />Doc: ";
            // print_r($doc);
            return $doc;
        }
    }
} ?>
