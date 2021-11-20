<?php
    require_once "../../../../MedOn/Back/MongoDB/conexao.php";
    require_once "../../../../MedOn/Back/MongoDB/Domain/usuario.php";
    require_once "../../../../MedOn/Back/MongoDB/Persistence/usuario.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    //setando os valores de usuario preencheidos pelo input Cadastro
    if ($acao == 'logar'){
        $usuario = new Usuario();
        $usuario->__set('crm',$_POST['crm']);
        $usuario->__set('senha',$_POST['senha']);
            
        $conexao = new Conexao();
        $servico_usuario = new Serviços_usuario($conexao, $usuario);
        $servico_usuario->logar();
        
        
    }elseif($acao == 'inserir'){
        
        $usuario = new Usuario();
        $usuario->__set('crm',$_POST['crm']);
        $usuario->__set('nome',$_POST['nome']);
        $usuario->__set('data_nascimento',$_POST['data_nascimento']);
        $usuario->__set('senha',$_POST['senha']);
        
        $conexao = new Conexao();
        $servico_usuario = new Serviços_usuario($conexao, $usuario);
        $servico_usuario->inserirUsuario();
    }
?>