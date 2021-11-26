<!DOCTYPE html>
<html>

<head>
    <title>Med On - Pesquisar</title>
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
        <form id="register-form" action="../Controllers/pesquisa.php?acao=pesquisar" method="post" name="pesquisar">
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

                <span>Problemas de saúde:<br></span>
                <span>Medicação regular:<br> </span>
                <span>Alergias:<br> </span>
                <span> Cirurgias:<br> </span>

            </div>



        </div>

    </div>

    <div class="clear">
    </div>
    <div class="pesquisePaciente">

        <p class="logar">Últimas consultas</p>
        <div class="centralizar">

            <div class="espaco">

                <span>Data:<br></span>
                <span>Diagnóstico:<br> </span>
                <span>Observação:<br> </span>

            </div>

        </div>

    </div>





</body>

</html>