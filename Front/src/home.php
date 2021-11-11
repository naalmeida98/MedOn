<?php
if (!isset($_SESSION)) {
    session_start();
}
$acao = 'calcularTotal';
require_once 'controle_servico_despesa.php';
require_once 'controle_servico_receita.php';

$_SESSION["saldo"] = $receitas_totais - $despesas_totais; ?>

<!DOCTYPE html>
<html>

<head>
    <title>Med On</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <header class="cabecalho">
        <a class="logo" href="index.php"> <img src="img/logo.jpeg"> </a>
        <div class="botão-sair">
            <ul><a href="controle_servico_logout.php"> Sair </a></ul>
        </div>
    </header>

    <div class="ola">
        <p>Bem-vindo Dr. <?php echo $_SESSION["nome_familia"]; ?></p>
    </div>

    <div class="receita_despesa">
        <!--
		<form id="botão" action="pessoa.php" method="post" name="pagpessoa">
			<div class="full">
				<input id="btn-submitLogin" type="submit" value="Pessoa">
			</div>
		</form> -->
        <form id="botão" action="despesa.php" method="post" name="pagdespesa">
            <div class="ful">
                <input id="btn-submitLogin" type="submit" value="+">
            </div>
        </form>
        <form id="botão" action="metaCurtoPrazo.php" method="post" name="pagmetacurto">
            <div class="ful">
                <input id="btn-submitLogin" type="submit" value="+">
            </div>
        </form>
        <form id="botão" action="metaLongoPrazo.php" method="post" name="pagmetalongo">
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