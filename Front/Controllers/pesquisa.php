<?php
if (!isset($_SESSION)) {
    session_start();
}
// require_once '../../../../MedOn/Back/MongoDB/Controllers/pesquisa.php'; 
require_once '../../../../MedOn/Back/Cassandra/Controllers/pesquisa.php';
