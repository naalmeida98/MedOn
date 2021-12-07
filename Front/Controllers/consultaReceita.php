<?php
if (!isset($_SESSION)) {
    session_start();
}
 require_once '../../../../MedOn/Back/MongoDB/Controllers/consultaReceita.php';
//require_once '../../../../MedOn/Back/Cassandra/Controllers/consultaReceita.php';
