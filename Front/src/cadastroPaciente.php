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
        <h1> Cadastre um paciente</h1>
    </div>

    <div class="cadrastrarPaciente">

        <p class="logar">Paciente</p>
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
            <p class="logar">Prontuário</p>
            <div class="full-box">
                <label for="name" class="required">Problemas de saúde</label>
                <input type="text" name="problemasSaude" id="problemas saúde" placeholder="Digite seus problemas de saúde">
            </div>

            <div class="full-box">
                <label for="name" class="required">Medicação regular</label>
                <input type="text" name="medicacao" id="medicacao" placeholder="Digite as medicações regulares">
            </div>

            <div class="full-box">
                <label for="name" class="required">Problema de saúde</label>
                <input type="text" name="problemasSaude" id="problemasSaude" placeholder="Digite seu problema de saúde">
            </div>

            <div class="full-box">
                <label for="name" class="required">Alergias</label>
                <input type="text" name="alergia" id="alergia" placeholder="Digite sua alegia">
            </div>

            <div class="full-box">
                <label for="name" class="required">Cirurgias</label>
                <input type="text" name="cirurgia" id="cirurgia" placeholder="Digite sua cirurgia">
            </div>


            <div class="fullCenter">
                <input id="btn-submit" type="submit" value="Salvar">
            </div>
        </form>
        <?php if (isset($_GET['pessoacadastrada']) && $_GET['pessoacadastrada'] == 1) { ?>
            <div class="fullBox">
                <h5>Consulta cadastrada com sucesso!</h5>
            </div>
        <?php } ?>
    </div>
    <div class="clear"></div>

</body>

</html>