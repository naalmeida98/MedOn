<?php

use MongoDB\Client;

require_once '../../../../MedOn/vendor/autoload.php';



class Conexao{
    private $m;
    private $db;

    public function conectar() {
        try {
            
            $mongo = new Client(
                'mongodb://admin:1234@localhost:27017/?authSource=MedOn&readPreference=primary&appname=MongoDB%20Compass&directConnection=true&ssl=false'
            );
            
            $db = $mongo->selectDatabase('MedOn');

            return $db;
        } catch (\Throwable $th) {
            echo "Database não foi conectado";
            echo $th;
        }
        
    }

    

}


?>