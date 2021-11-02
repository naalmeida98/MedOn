<?php
    require_once "../conexao.php";
    require_once "../Domain/usuario.php";
    require_once "../Persistence/usuario.php";

    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;
    //setando os valores de usuario preencheidos pelo input Cadastro
    if ($acao == 'logar'){
        
        
        // if( $_POST['login'] == '' || $_POST['nome_familia'] == '' || $_POST['qtd_pessoas'] == ''
        //     || $_POST['senha'] == ''){
        //     $usuario = new Usuario();
        //     $conexao = new Conexao();
        //     $servico_usuario = new Serviços_usuario($conexao, $usuario);
        //     $servico_usuario->erro();
        // }
    }
?>