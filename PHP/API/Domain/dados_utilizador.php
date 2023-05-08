<?php
require 'config.php';
session_start();

class Utilizador {


      
      function UtilizadorEValido($email,$password){
         $false = array(0 => "false");
         $conexao = new Conexao();
         $esgaca = $conexao->runQuery('SELECT * FROM utilizador WHERE email = :email');
         $esgaca-> execute(array(':email' => $email));
         $row = $esgaca->fetch(PDO::FETCH_ASSOC);
   
 
 
         if ($row == false) {
             return $false;
         } else {
                    if ($password == $row['password']) {    
                    
                        $guardarutilizador=array('ID_Utilizadores' => $row['ID_Utilizadores'],'nome' => $row['nome'],'email' => $row['email'],'password' => $row['password'],'permissao' => $row['permissao']);
                        return $guardarutilizador;
            }else{
               return $false;
            }
         
         }
      }
        }

?>




