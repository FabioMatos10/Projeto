<?php

require '../API/Domain/config.php';

session_start();


include "menu/menu.php"




?>
   <link rel="stylesheet" href="css/style_adminpage.css">
   <link rel="stylesheet" href="menu/style.css">
   <link rel="stylesheet" href="menu/style1.css">
   




<?php
 

         if(isset($_POST['adcionar_ginasios'])){
  
            $conn = mysqli_connect('localhost','root','','pap');
            $NomeGinasio = ($_POST['NomeGinasio']);
            $Localidade = ($_POST['Localidade']);



         
            $select = " SELECT * FROM ginasio WHERE NomeGinasio = '$NomeGinasio' && Localidade = '$Localidade' ";
           
            $result = mysqli_query($conn, $select);

            if(mysqli_num_rows($result) > 0){

            }else{

               if($Localidade != $Localidade){
                  $error[] = 'ja existe essa atividade';
               }else{
            
                  $insert = "INSERT INTO ginasio(NomeGinasio, Localidade) VALUES('$NomeGinasio','$Localidade')";
                  
                  mysqli_query($conn, $insert);
                 
               }
            }

         };


         ?>

<div class="form-container">

<form action="" method="post">
   <h3>Adcionar Ginasios</h3>
   <?php
   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      };
   };
   ?>
   <input type="text" name="NomeGinasio" required placeholder="Digite o seu nome do ginasio">
   <input type="text" name="Localidade" required placeholder="Digite a localidade">



   </select>
   <input type="submit" name="adcionar_ginasios" value="ADCIONAR" class="form-btn">

</form>

</div>


<?php
include "menu/footer.php"
?>

