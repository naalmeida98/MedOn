<?php
if (!isset($_SESSION)) {
    session_start();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>MedOn | Login</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="background-image: url(img/background2.jpeg); background-repeat: no-repeat;   background-size:100%;">

    <header class=" cabecalho">
        <a class="logo" href="cadastroUsuario.php"> <img src="img/logo.jpeg"> </a>
    </header>

    <div class="fundoPretoLogin">
        <br> <br> MedOn
    </div>

    <div class="fazerLogin">

        <p class="logar">Login</p>

        <div class="login-center">
            <form id="register-form" action="../Controllers/usuario.php?acao=logar" method="post" name="logar">

                <div class="full-box">
                    <label class="required" for="name">CRM</label>
                    <input type="text" name="crm" id="login" placeholder="Digite seu login">
                </div>
                <div class="full-box">
                    <label class="required" for="name">Senha</label>
                    <input type="text" name="senha" id="senha" placeholder="Digite sua senha">
                </div>
                <div class="required" style="padding-left:10px;"> Itens obrigatórios</div>
                <div class="full">
                    <input id="btn-submit" type="submit" value="Entrar">
                </div>
            </form>
            <div style="background-color: #63e3ec; border-radius:10px;">
                <?php if (isset($_GET['loginnegado']) && $_GET['loginnegado'] == 1) { ?>
                    <div class="msgForm">
                        <h4>ATENÇÃO!!!</h4>
                        <h5>CRM ou senha incorretos! </h5>
                    </div>
                <?php } ?>
                
            </div>
            <div style="background-color: #63e3ec; border-radius:10px; margin-top:10px;">
                <?php 
                if (isset($_GET['erro']) && $_GET['erro'] == 1) { ?>
                    <div class="msgForm">
                        <h5>Erro ao logar, tente novamente!</h5>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="clear"></div>
</body>

</html>