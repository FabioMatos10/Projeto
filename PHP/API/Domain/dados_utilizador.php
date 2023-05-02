<?php
require 'config.php';

class Utilizador {
    // Properties
    private $email;
    private $password;
  
    // Methods
    function set_email($email) {
      $this->email = $email;
    }
    function get_email() {
      return $this->email;
    }

    function set_password($password) {
        $this->password = $password;
      }
      function get_password() {
        return $this->password;
      }

      function UtilizadorEValido($email,$password){
        $conexao = new Conexao();
       
            $select = " SELECT * FROM utilizador WHERE email = '$email' && password = '$pass' ";
         
            $result = mysqli_query($conn, $select);
         
            if(mysqli_num_rows($result) > 0){
         
               $row = mysqli_fetch_array($result);
         
               if($row['permissao'] == 'admin'){
         
                  $_SESSION['admin_name'] = $row['nome'];
                  header('location:admin_page.php');
                  echo "admin";
         
               }else{
         
               
         
                  $_SESSION['user_name'] = $row['nome'];
                  header('location:user_page.php');
                  echo "user";
               }
              
            }else{
               echo"error";
            }
         
         }
        }
      
    


?>




