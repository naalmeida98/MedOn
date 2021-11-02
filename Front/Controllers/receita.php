<?php
    if(!isset($_SESSION)){session_start();}
    require_once '../../../../MedOn/Back/'+$_SESSION['BD']+'/Controllers/receita.php'; 
?>