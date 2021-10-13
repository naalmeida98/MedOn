<?php
    if(!isset($_SESSION)){session_start();}
    require_once '../../Back/'+$_SESSION['BD']+'/Controllers/prontuário.php'; 
?>