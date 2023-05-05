<?php
require 'Domain/dados_utilizador.php';

switch ($_POST['accao'])
{
    case 'login':
        login($_POST['email'],$_POST['password']);
    break;
    default:
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        echo json_encode(array("success" => false, "message" => $_POST['accao'] . " is not valid"));
        break;
}

function login($email,$password){
    try {
        // Do your stuff
        $utilizador = new Utilizador();
        $obterUtilizador = $utilizador->UtilizadorEValido($email,$password);
        header($_SERVER['SERVER_PROTOCOL'] . ' 200 Ok', true, 200);
        echo json_encode($obterUtilizador);
        return;
    } catch (Exception $e) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        echo json_encode(array("success" => false, "message" => $e->getMessage()));
        return;
    }

}



?>