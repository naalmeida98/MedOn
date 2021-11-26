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
    if ($acao == 'pesquisar'){
        $paciente = new Paciente();
        $paciente->__set('cpf',$_POST['cpf_paciente']);
        // $consulta->__set('diagnostico',$_POST['diagnostico']);
        // $consulta->__set('obs_consulta',$_POST['obs_consulta']);
        // $receita = new Receita();
        // $receita->__set('remedio',$_POST['remedio']);
        // $receita->__set('dosagem',$_POST['dosagem']);
        // $receita->__set('tempo',$_POST['tempo']);
        // $receita->__set('obs_receita',$_POST['obs_receita']);

        
        
        $conexao = new Conexao();
        $servico_pesquisa = new Serviços_pesquisa($conexao,$paciente);
        $servico_pesquisa->pesquisar();
        
        
    }elseif($acao == ''){
        
        
    }
?>