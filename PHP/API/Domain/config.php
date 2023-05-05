<?php

class Conexao {
    // Properties
    public $connect;

    function __construct() {
        
        // Conectar á base de dados
        try {
            $this->connect = new PDO("mysql:host=" . "localhost" . "; dbname=" . "pap", "root", "");
            $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $error) {
            echo $error->getMessage();
            
        }
    }

    function runQuery($query)
    {
        return $this->connect->prepare($query);
    }
}
?>

