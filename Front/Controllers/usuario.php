<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once '../../../../MedOn/Back/MongoDB/Controllers/usuario.php';
//require_once '../../../../MedOn/Back/Cassandra/Controllers/usuario.php';
