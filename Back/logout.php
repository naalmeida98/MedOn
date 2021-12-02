<?php 

    unset($_SESSION["crm_medico"]);
    unset($_SESSION["nome_medico"]);
    header('Location: ../src/index.php');

?>