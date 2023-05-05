<?php
require 'config.php';
session_start();

class Utilizador {



      function UtilizadorEValido($email,$password){
         $conexao = new Conexao();
         $esgaca = $conexao->runQuery('SELECT * FROM utilizador WHERE email = :email');
         $esgaca-> execute(array(':email' => $email));
         $row = $esgaca->fetch(PDO::FETCH_ASSOC);
 
 
 
         if ($row == false) {
             return false;
         } else {
                    if ($password == $row['password']) {    
                     if($row['permissao'] == 'admin'){
                        $_SESSION['admin_name'] =  $row['nome'];
                        return "admin";

                     }else{

                      return "user";
                     }
 
            }else{
               return false;
            }
         
         }
      }
        }

?>




