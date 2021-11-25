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


</body>

</html>