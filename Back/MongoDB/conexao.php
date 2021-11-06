<?php

use MongoDB\Client;

require_once '../../../../MedOn/vendor/autoload.php';

class Conexao{
    private $m;
    private $db;

    public function conectar() {
        try {
            $m = new Client(
                'mongodb://admin:1234@localhost:27017'
            );   
            $db = $m->MedOn;
    
            return $db;
        } catch (\Throwable $th) {
            echo "Database não foi conectado";
        }
        
    }

    

}


?>