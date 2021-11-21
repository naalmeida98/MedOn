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
        <form id="register-form" action="../Controllers/pacienteProntuario.php?acao=inserir" method="post" name="logar">
            <div class="full-box">
                <label for="name" class="required">Nome</label>
                <input type="text" name="nome" id="nome" placeholder="Digite o nome completo">

            </div>
            <div class="full-box">
                <label for="name" class="required">CPF</label>
                <input type="text" name="cpf" id="cpf" placeholder="Digite o CPF (apenas números)">
            </div>
            <div class="full-box">
                <label for="name" class="required">Data de nascimento</label>
                <input type="date" name="data_nascimento" id="data_nascimento" placeholder="Digite a data de nascimento">
            </div>

            <p class="logar">Prontuário</p>
            <div class="full-box">
                <label for="name" class="required">Problemas de saúde</label>
                <input type="text" name="problemas" id="problemas saúde" placeholder="Digite os problemas de saúde">
            </div>

            <div class="full-box">
                <label for="name" class="required">Medicação regular</label>
                <input type="text" name="medicacoes" id="medicacao" placeholder="Digite as medicações regulares">
            </div>

            <div class="full-box">
                <label for="name" class="required">Alergias</label>
                <input type="text" name="alergias" id="alergia" placeholder="Digite sua alegia">
            </div>

            <div class="full-box">
                <label for="name" class="required">Cirurgias</label>
                <input type="text" name="cirurgias" id="cirurgia" placeholder="Digite sua cirurgia">
            </div>


            <div class="fullCenter">
                <input id="btn-submit" type="submit" value="Salvar">
            </div>
        </form>
        <?php if (isset($_GET['pessoacadastrada']) && $_GET['pessoacadastrada'] == 1) { ?>
            <div class="fullBox">
                <h5>Paciente e prontuário cadastrados com sucesso!</h5>
            </div>
        <?php } 
            
            if (isset($_GET['pacienteexistente']) && $_GET['pacienteexistente'] == 1) { ?>
                <div class="msgForm">
                    <h5>Paciente já foi cadastrado!</h5>
                </div>
            <?php }    ?>
    </div>
    <div class="clear"></div>

</body>

</html>