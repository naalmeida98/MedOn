<?php
if (!isset($_SESSION)) {
    session_start();
} ?>

<!DOCTYPE html>
<html>

<head>
    <title>Med On</title>
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

    <div class="ola">
        <p>Bem-vindo Dr/a. <?php echo $_SESSION["nome_medico"]; ?></p>
    </div>


    <div class="receita_despesa">

        <form id="botão" action="../src/cadastroConsultaReceita.php" method="post" name="cadConsulta">
            <div class="ful">
                <input id="btn-submitLogin" type="submit" value="+">
            </div>
        </form>
        <form id="botão" action="../src/cadastroPacienteProntuario.php" method="post" name="cadPaciente">
            <div class="ful">
                <input id="btn-submitLogin" type="submit" value="+">
            </div>
        </form>
        <form id="botão" action="../src/pesquisa.php" method="post" name="pesquisa">
            <div class="ful">
                <input id="btn-submitLogin" type="submit" value="+">
            </div>
        </form>

    </div>
    <div class="clear"></div>
    <div class="texto">
        <h1>Consulta Paciente Pesquisar</h1>

    </div>
    <div class="clear"></div>

</body>

</html>