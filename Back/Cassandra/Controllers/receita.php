<?php
    if(!isset($_SESSION)){session_start();}
    require_once '../../Back/'+$_SESSION['BD']+'/conexão.php'; 
    require_once '../../Back/'+$_SESSION['BD']+'/Domain/receita.php';
    require_once '../../Back/'+$_SESSION['BD']+'/Persistence/receita.php'; 
?>