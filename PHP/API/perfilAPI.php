<?php
require 'Domain/utilizador_alterar.php';

switch ($_POST['accao'])
{
    case 'carregar':
        carregar($_POST['ID_Utilizador']);
    break;
    default:
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        echo json_encode(array("success" => false, "message" => $_POST['accao'] . " is not valid"));
        break;
}

function carregar($ID_Utilizador){
    try {
        // Do your stuff  
        $utilizador = new Utilizador();
        $verificardados = $utilizador->carregar_dados($ID_Utilizador);      
        header($_SERVER['SERVER_PROTOCOL'] . ' 200 Ok', true, 200);
        echo json_encode($verificardados);
        return;
    } catch (Exception $e) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        echo json_encode(array("success" => false, "message" => $e->getMessage()));
        return;
    }

}

?>