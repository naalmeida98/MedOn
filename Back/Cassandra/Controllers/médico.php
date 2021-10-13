<?php
    if(!isset($_SESSION)){session_start();}
    require_once '../../Back/'+$_SESSION['BD']+'/conexão.php'; 
    require_once '../../Back/'+$_SESSION['BD']+'/Domain/médico.php';
    require_once '../../Back/'+$_SESSION['BD']+'/Persistence/médico.php'; 
?>