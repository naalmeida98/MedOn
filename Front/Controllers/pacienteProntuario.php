<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once '../../../../MedOn/Back/MongoDB/Controllers/pacienteProntuario.php'; 
//require_once '../../../../MedOn/Back/Cassandra/Controllers/pacienteProntuario.php';
