<?php

if (isset($_GET['pesquisar']) && $_GET['pesquisar'] == 1) {
    $acao = 'pesquisar';
    require_once '../Controllers/pesquisa.php';
    if ($doc != -1) {
        $doc_completo = $doc_completo = isset($doc) ? $doc : $doc; 
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Med On - Pesquisar</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header class="cabecalho">
        <a class="logo" href="home.php"> <img src="img/logo.jpeg"> </a>
        <div class="botão-sair">
            <ul><a href="../Controllers/logout.php"> Sair </a></ul>
        </div>
    </header>

    <div class="bot">
        <form id="botão" action="home.php" method="post" name="pagprincipal">
            <div class=fulBotao>
                <input id="btn-submitLogi" type="submit" value="Home">
            </div>
        </form>

        <form id="botão" action="cadastroConsultaReceita.php" method="post" name="cadastroReceita">
            <div class=fulBotao>
                <input id="btn-submitLogi" type="submit" value="Cadastro consulta">
            </div>
        </form>
        <form id="botão" action="cadastroPacienteProntuario.php" method="post" name="cadastroPaciente">
            <div class=fulBotao>
                <input id="btn-submitLogi" type="submit" value="Cadastro Paciente/Prontuário">
            </div>
        </form>
        <form id="botão" action="pesquisa.php" method="post" name="pesquisa">
            <div class=fulBotao>
                <input id="btn-submitLogi" type="submit" value="Pesquisa">
            </div>
        </form>


    </div>
    <div class="clear"></div>

    <div class="pesquisePaciente">

        <p class="logar">Pesquise pelo Paciente</p>
        <div class="centralizar">
            <form id="register-form" action="pesquisa.php?pesquisar=1" method="post" name="pesquisar">
                <div class="full-box">
                    <label for="name" class="required">CPF</label>
                    <input type="text" name="cpf_paciente" id="cpf" placeholder="Digite o CPF (apenas números)">
                </div>

                <div class="fullCenter">
                    <input id="btn-submit" type="submit" value="Pesquisar">
                </div>
            </form>
        </div>

    </div>


    <div class="pesquisePaciente">

        <p class="logar">Prontuário</p>
        <div class="centralizar">

            <div class="espaco">
                <?php if (isset($_GET['pesquisar']) && $_GET['pesquisar'] == 1) {
                    if ($doc != -1) { ?>
                        <span>Nome completo: <?php echo $doc_completo[0]['nome'] ?> <br></span>
                        <span>CPF: <?php echo $doc_completo[0]['cpf'] ?> <br></span>
                        <span>Data de nascimento: <?php echo $doc_completo[0]['data_nascimento'] ?> <br></span>
                        <span>Problemas de saúde: <?php echo $doc_completo[1]['problemas'] ?> <br></span>
                        <span>Medicação regular: <?php echo $doc_completo[1]['medicacoes'] ?> <br> </span>
                        <span>Alergias: <?php echo $doc_completo[1]['alergias'] ?> <br> </span>
                        <span> Cirurgias: <?php echo $doc_completo[1]['cirurgias'] ?> <br> </span>
                <?php }
                } ?>
            </div>
        </div>

    </div>

    <div class="clear">
    </div>
    <div class="pesquisePaciente">

        <p class="logar">Últimas consultas</p>
        <div class="centralizar">

            <div class="espaco">
                <?php
                if (isset($_GET['pesquisar']) && $_GET['pesquisar'] == 1) {
                    if ($doc != -1) {
                        $i = isset($i) ? 0 : 0;
                        for ($i = 0; $i < $doc_completo[4]; $i++) { ?>
                            <h1> Consulta <?php echo ($i + 1) ?></h1>
                            <span>Médico: <?php echo $doc_completo[2][$i]['nome_medico'] ?> <br></span>
                            <span>Data: <?php echo $doc_completo[2][$i]['data'] ?> <br></span>
                            <span>Diagnóstico: <?php echo $doc_completo[2][$i]['diagnostico'] ?> <br></span>
                            <span>Observação da consulta: <?php echo $doc_completo[2][$i]['obs_consulta'] ?> <br></span>

                            <span>Medicação:<br> <?php echo $doc_completo[3][$i]['remedio'] ?> </span>
                            <span>Dosagem: <?php echo $doc_completo[3][$i]['dosagem'] ?> <br></span>
                            <span>Tempo: <?php echo $doc_completo[3][$i]['tempo'] ?> <br></span>
                            <span>Observação da Medicação: <?php echo $doc_completo[3][$i]['obs_receita'] ?> <br></span>

                            <br>
                            <hr>
                <?php }
                    }
                    if ($doc == -1) {
                        echo "CPF inválido";
                    }
                } ?>
            </div>

        </div>

    </div>





</body>

</html>