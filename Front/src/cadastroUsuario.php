<?php
if (!isset($_SESSION)) {
    session_start();
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>MedOn</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale 1">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>

    <header class="cabecalho">
        <a class="logo" href="index.php"> <img src="img/logo.jpeg"> </a>
    </header>

    <div class="fundoPretoCadastro">
        <div class="frase">
            MedOn
        </div>
    </div>

    <div class="cadastro">

        <p class="cadastrar">CADASTRE-SE</p>

        <div class="centro-cadastro">
            <form id="register-form" action="../Controllers/usuario.php?acao=inserir" method="post" name="cadastro">

                <div class="full-box">
                    <label for="name" class="required"> CRM</label>
                    <input type="text" name="login" id="crm" placeholder="Digite seu CRM">
                </div>
                <div class="full-box">
                    <label for="name" class="required">Nome completo</label>
                    <input type="text" name="nome" id="nome" placeholder="Digite seu nome completo">
                </div>
                <div class="full-box">
                    <label for="name" class="required">Data nascimento</label>
                    <input type="text" name="data_nascimento" id="data_nascimento" placeholder="Digite sua data de nascimento">
                </div>
                <div class="full-box">
                    <label for="name" class="required">Senha</label>
                    <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
                </div>
                <div class="full-box">
                    <label class="required" for="passconfirmation">Confirmação de senha</label>
                    <input type="password" name="passconfirmation" id="passwordconfirmation" placeholder="Digite novamente sua senha">
                </div>
                <div style="padding-left:10px;" class="required"> Itens obrigatórios</div>
                <div class="full">
                    <input id="btn-submit" type="submit" value="Cadastre-se">
                </div>

            </form>
        </div>
        <div style="background-color:#63e3ec; border-radius:10px;">
            <?php if (isset($_GET['inputEmBranco']) && $_GET['inputEmBranco'] == 1) { ?>
                <div class="msgForm">
                    <h5>Preencha todos os campos obrigatórios</h5>
                </div>
            <?php }
            if (isset($_GET['usuarioexistente']) && $_GET['usuarioexistente'] == 1) { ?>
                <div class="msgForm">
                    <h5>Usuário já existente, escolha um outro login</h5>
                </div>
            <?php }
            if (isset($_GET['senhaIncorreta']) && $_GET['senhaIncorreta'] == 1) { ?>
                <div class="msgForm">
                    <h5>Senhas desiguais, refaça o cadastro!</h5>
                </div>
            <?php }
            if (isset($_GET['erro']) && $_GET['erro'] == 1) { ?>
                <div class="msgForm">
                    <h5>Erro ao cadastrar, tente novamente!!</h5>
                </div>
            <?php }    ?>
        </div>
        <form id="register-form" action="login.php" method="post" name="logar">
            <div class="login">
                Já tem cadastro?
                <div class="full">
                    <input id="btn-submit" type="submit" value="Login">
                </div>
            </div>
        </form>
    </div>
    <div class="clear"></div>
    <div id="copyright"> Desenvolvido por Aline Dias, Helena Dias e  Natália Almeida</div>
    <script src="JS/scripts.js"></script>

</body>

</html>