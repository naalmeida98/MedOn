<!DOCTYPE html>
<html>

<head>
    <title>MedOn | Cadastro Médico</title>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="css/style.css">
</head>

<body>


    <header class="cabecalho">
        <a class="logo" href="index.php"> <img src="img/logo.jpeg"> </a>
    </header>

    <div class="clear"></div>

    <div class="cadastreTexto">
        <h1> Cadastre um médico</h1>
    </div>

    <div class="cadrastrarMedico">

        <form id="register-form" action="controle_servico_pessoa.php?acao=inserirPessoa" method="post" name="logar">
            <div class="full-box">
                <label for="name" class="required">Nome</label>
                <input type="text" name="nome_pessoa" id="nome" placeholder="Digite o nome completo">

            </div>
            <div class="full-box">
                <label for="name" class="required">CRM</label>
                <input type="text" name="crm" id="crm" placeholder="Digite o CRM (apenas números)">
            </div>
            <div class="full-box">
                <label for="name" class="required">Data de nascimento</label>
                <input type="date" name="dataNasc" id="dataNasc" placeholder="Digite a data de nascimento">
            </div>
            <div class="full-box">
                <label for="name" class="required">E-mail</label>
                <input type="text" name="email" id="email" placeholder="Digite o email">
            </div>
            <div class="full-box">
                <label for="name" class="required"> Login</label>
                <input type="text" name="login" id="login" placeholder="Digite seu nome">
            </div>

            <div class="full-box">
                <label for="name" class="required">Senha</label>
                <input type="password" name="senha" id="senha" placeholder="Digite sua senha">
            </div>
            <div class="full-box">
                <label class="required" for="passconfirmation">Confirmação de senha</label>
                <input type="password" name="passconfirmation" id="passwordconfirmation" placeholder="Digite novamente sua senha">
            </div>

            <div class="full-box">
                <input id="btn-submit" type="submit" value="Salvar">
            </div>
        </form>
        <?php if (isset($_GET['pessoacadastrada']) && $_GET['pessoacadastrada'] == 1) { ?>
            <div class="fullBox">
                <h5>Médico cadastrado com sucesso!</h5>
            </div>
        <?php } ?>
    </div>
    <div class="clear"></div>

</body>

</html>