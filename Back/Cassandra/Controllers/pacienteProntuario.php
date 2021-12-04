<?php
require_once "../../../../MedOn/Back/Cassandra/conexao.php";
require_once "../../../../MedOn/Back/Cassandra/Domain/paciente.php";
require_once "../../../../MedOn/Back/Cassandra/Domain/prontuario.php";
require_once "../../../../MedOn/Back/Cassandra/Persistence/pacienteProntuario.php";

$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
//setando os valores de paciente preencheidos pelo input Cadastro
if ($acao == 'inserir') {
    $paciente = new Paciente();
    $paciente->__set('nome', $_POST['nome']);
    $paciente->__set('cpf', $_POST['cpf']);
    $paciente->__set('data_nascimento', $_POST['data_nascimento']);
    $prontuario = new Prontuario();
    $prontuario->__set('problemas', $_POST['problemas']);
    $prontuario->__set('medicacoes', $_POST['medicacoes']);
    $prontuario->__set('alergias', $_POST['alergias']);
    $prontuario->__set('cirurgias', $_POST['cirurgias']);

    $conexao = new Conexao();
    $servico_pacienteProntuario = new Serviços_pacienteProntuario($conexao, $paciente, $prontuario);
    $servico_pacienteProntuario->inserirPacienteProntuario();
} elseif ($acao == '') {
}
