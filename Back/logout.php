<?php 

    unset($_SESSION["crm_medico"]);
    unset($_SESSION["nome_medico"]);
    unset($_SESSION["cpf_paciente"]);
    header('Location: ../src/index.php');
