<?php
require 'Domain/dados_utilizador.php';

switch ($_POST['accao'])
{
    case 'guardardados':
        registo($_POST['nome'],$_POST['email'],$_POST['password'],$_POST['cpassword']);
    break;
    default:
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        echo json_encode(array("success" => false, "message" => "acao is not valid"));
        break;
}
function registo($nome,$email,$password,$cpassword){
    try {
        // Do your stuff
        $utilizador = new Utilizador();
        $guardarutilzador = $utilizador->novoresgisto($nome,$email,$password,$cpassword);
        header($_SERVER['SERVER_PROTOCOL'] . ' 200 Ok', true, 200);
        echo json_encode($guardarutilzador);
        return;
    } catch (Exception $e) {
        header($_SERVER['SERVER_PROTOCOL'] . ' 500 Internal Server Error', true, 500);
        echo json_encode(array("success" => false, "message" => $e->getMessage()));
        return;
    }

}



?>