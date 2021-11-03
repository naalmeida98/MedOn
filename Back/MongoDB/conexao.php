<?php

use MongoDB\Client;

require_once '../../vendor/autoload.php';

class Conexao{
    private $m;
    private $db;

    public function conectar($atributo) {
        try {
            $m = new Client(
                'mongodb+srv://vini:12345@localhost:27017'
            );   
            $db = $m->MedOn->$atributo;
    
            return $db;
        } catch (\Throwable $th) {
            echo "Database não foi conectado";
        }
        
    }

    

}


?>