<?php
    require_once "../conexao.php";
    require_once "../Domain/usuario.php";
    require_once "../Persistence/usuario.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    //setando os valores de usuario preencheidos pelo input Cadastro
    if ($acao == 'logar'){
        $usuario = new Usuario();
        $usuario->__set('crm',$_POST['crm']);
        $usuario->__set('nome',$_POST['nome']);
        $usuario->__set('data_nascimento',$_POST['data_nascimento']);
        $usuario->__set('senha',$_POST['senha']);
            
        $conexao = new Conexao();
        $servico_usuario = new Serviços_usuario($conexao, $usuario);
        $servico_usuario->inserirUsuario();
        
        // if( $_POST['login'] == '' || $_POST['nome_familia'] == '' || $_POST['qtd_pessoas'] == ''
        //     || $_POST['senha'] == ''){
            //     $usuario = new Usuario();
            //     $conexao = new Conexao();
            //     $servico_usuario = new Serviços_usuario($conexao, $usuario);
            //     $servico_usuario->erro();
        // }else{
        //     $usuario = new Usuario();
        //     $usuario->__set('login',$_POST['login']);
        //     $usuario->__set('nome_familia',$_POST['nome_familia']);
        //     $usuario->__set('qtd_pessoas',$_POST['qtd_pessoas']);
        //     $usuario->__set('senha',$_POST['senha']);
            
        //     $conexao = new Conexao();
        //     $servico_usuario = new Serviços_usuario($conexao, $usuario);
        //     $servico_usuario->inserirUsuario();
        // }
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