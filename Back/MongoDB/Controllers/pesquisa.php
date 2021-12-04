<?php
    require_once "../../../../MedOn/Back/MongoDB/conexao.php";
    // require_once "../../../../MedOn/Back/MongoDB/Domain/consulta.php";
    // require_once "../../../../MedOn/Back/MongoDB/Domain/receita.php";
    // require_once "../../../../MedOn/Back/MongoDB/Persistence/consultaReceita.php";
    require_once "../../../../MedOn/Back/MongoDB/Domain/paciente.php";
    // require_once "../../../../MedOn/Back/MongoDB/Domain/prontuario.php";
    // require_once "../../../../MedOn/Back/MongoDB/Persistence/pacienteProntuario.php";
    require_once "../../../../MedOn/Back/MongoDB/Persistence/pesquisa.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    //setando os valores de consulta preencheidos pelo input Cadastro
    if ($acao == 'pesquisar1'){
        $paciente = new Paciente();
        $paciente->__set('cpf',$_POST['cpf_paciente']);
        $validar = false;
        $vazio = false;
        
        $conexao = new Conexao();
        $servico_pesquisa = new Serviços_pesquisa($conexao,$paciente);
        $doc = $servico_pesquisa->pesquisar(); 
              
    } elseif($acao == 'pesquisar2'){
        if (!isset($_SESSION)) {
            session_start();
        }

        $paciente = new Paciente();
        $paciente->__set('cpf',$_SESSION["cpf_paciente"]);
        $validar = false;
        $vazio = false;
        
        $conexao = new Conexao();
        $servico_pesquisa = new Serviços_pesquisa($conexao,$paciente);
        $doc = $servico_pesquisa->pesquisar();
    }
?>