<?php
require 'config.php';


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
        

        function novoresgisto($nome,  $email, $pass,  $cpass){
               $conexao = new Conexao();
      
               $stmt = $conexao->runQuery('SELECT * FROM utilizador WHERE email = :email');
               $stmt->execute(array(':email' => $email));
               $data = $stmt->fetch(PDO::FETCH_ASSOC);
               
               if($pass != $cpass){          
                  return "palavraspassesdiferentes";
               }else{
                     

               if ($data == false) {
                  try{
                     $stmt = $conexao->runQuery('INSERT INTO utilizador (nome, email, password, permissao) VALUES (:nome, :email,:password, :permissao)');
                     $stmt->execute(array(':nome' => $nome, ':email' => $email,':password' => $pass, ':permissao' => "user"));
      
                     return "true";
                  }catch(PDOExtrueception $e){
                     return "erroConexao";
                  }
      
                  
               }else{
                  return "utilizadorjaexiste";
               }
            }
         }
    
      }
?>




