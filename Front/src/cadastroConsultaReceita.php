<!DOCTYPE html>
<html>

<head>
    <title>MedOn | Cadastro consulta</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <header class="cabecalho">
        <a class="logo" href="cadastroUsuario.php"> <img src="img/logo.jpeg"> </a>

        <a class="logo" href="home.php"> <img src="img/logo.jpeg"> </a>
        <div class="botão-sair">
            <ul><a href="../Controllers/logout.php"> Sair </a></ul>
        </div>

    </header>

    <div class="clear"></div>

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
    <div class="cadastreTexto">
        <h1> Cadastre uma consulta</h1>
    </div>

    <div class="cadrastrarConsulta">

        <p class="logar">Consulta</p>
        <form id="register-form" action="../Controllers/consultaReceita.php?acao=inserir" method="post" name="logar">
            <div class="full-box">
                <label for="name" class="required">CPF do Paciente</label>
                <input type="text" name="cpf_paciente" id="cpf" placeholder="Digite o CPF">

            </div>

            <div class="full-box">
                <label for="name" class="required">Data da consulta</label>
                <input type="date" name="data" id="data" placeholder="Digite a data ">
            </div>

            <div class="full-box">
                <label for="name" class="required">Diagnóstico</label>
                <textarea id="msg" name="diagnostico" placeholder="Digite o diagnótico"></textarea>

            </div>

            <div class="full-box">
                <label for="name" class="required">Observação</label>
                <textarea id="msg" name='obs_consulta' placeholder="Digite a observação"></textarea>


            </div>

            <p class="logar">Receita</p>
            <div class="full-box">
                <label for="name" class="required">Remédio</label>
                <input type="text" name="remedio" id="remedio" placeholder="Digite os remédios">
            </div>

            <div class="full-box">
                <label for="name" class="required">Dosagem</label>
                <input type="text" name="dosagem" id="dosagem" placeholder="Digite a dosagem">
            </div>

            <div class="full-box">
                <label for="name" class="required">Tempo</label>
                <input type="text" name="tempo" id="problemasSaude" placeholder="Digite os dias">
            </div>

            <div class="full-box">
                <label for="name" class="required">Observação</label>
                <textarea id="msg" name='obs_receita' placeholder="Digite a observação"></textarea>
            </div>

            <div class="fullCente">
                <input id="btn-submit" type="submit" value="Salvar">
            </div>
        </form>
        <?php if (isset($_GET['consultacadastrada']) && $_GET['consultacadastrada'] == 1) { ?>
            <div class="fullBox">
                <h5>Consulta realizada com sucesso!</h5>
            </div>
        <?php }
        if (isset($_GET['pacienteinexistente']) && $_GET['pacienteinexistente'] == 1) { ?>
            <div class="msgForm">
                <h5>Paciente não foi cadastrado, gentileza cadastrar!</h5>
            </div>
        <?php }    ?>
    </div>
    <div class="clear"></div>

</body>

</html>