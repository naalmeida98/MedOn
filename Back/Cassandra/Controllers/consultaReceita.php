<?php
    require_once "../../../../MedOn/Back/Cassandra/conexao.php";
    require_once "../../../../MedOn/Back/Cassandra/Domain/consulta.php";
    require_once "../../../../MedOn/Back/Cassandra/Domain/receita.php";
    require_once "../../../../MedOn/Back/Cassandra/Persistence/consultaReceita.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    //setando os valores de consulta preencheidos pelo input Cadastro
    if ($acao == 'inserir'){
        $consulta = new Consulta();
        $consulta->__set('data',$_POST['data']);
        $consulta->__set('cpf_paciente',$_POST['cpf_paciente']);
        $consulta->__set('diagnostico',$_POST['diagnostico']);
        $consulta->__set('obs_consulta',$_POST['obs_consulta']);
        $receita = new Receita();
        $receita->__set('remedio',$_POST['remedio']);
        $receita->__set('dosagem',$_POST['dosagem']);
        $receita->__set('tempo',$_POST['tempo']);
        $receita->__set('obs_receita',$_POST['obs_receita']);
        
        $conexao = new Conexao();
        $servico_consultaReceita = new Serviços_consultaReceita($conexao, $consulta, $receita);
        $servico_consultaReceita->inserirConsultaReceita();
        
        
    }elseif($acao == ''){
        
        
    }
