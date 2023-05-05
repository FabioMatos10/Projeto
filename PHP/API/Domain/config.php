<?php
define('host', 'localhost');
define('utilizador', 'root');
define('password', '');
define('nomeBaseDados', 'pap');

class Conexao {
    // Properties
    public $connect;

    function __construct() {
        
        // Conectar á base de dados
        try {
            $this->connect = new PDO("mysql:host=" . host . "; dbname=" . nomeBaseDados, utilizador, password);
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

