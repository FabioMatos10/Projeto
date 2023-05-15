<?php

require '../API/Domain/config.php';

session_start();


include "menu/menu.php"




?>
   <link rel="stylesheet" href="css/style_adminpage.css">
   <link rel="stylesheet" href="menu/style.css">
   <link rel="stylesheet" href="menu/style1.css">
   

<?php
$conn = mysqli_connect('localhost','root','','pap');




if(isset($_POST['adcionar_acesso'])){

   $ID_Ginasio = ($_POST['ID_Ginasio']);
   $ID_Utilizadores = ($_POST['ID_Utilizadores']);
   $Hora_entrada = ($_POST['Hora_entrada']);
   $Hora_saida = ($_POST['Hora_saida']);
   $Dia = ($_POST['Dia']);





   $select = " SELECT * FROM acessos WHERE ID_Ginasio = '$ID_Ginasio' && ID_Utilizadores = '$ID_Utilizadores' && Hora_entrada = '$Hora_entrada'&& Hora_saida = '$Hora_saida'&& Dia = '$Dia' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){


   }else{

      if($Hora_entrada != $Hora_entrada){
         $error[] = '';
      }else{
         $insert = "INSERT INTO acessos(ID_Ginasio, ID_Utilizadores, Hora_entrada, Hora_saida, Dia ) VALUES('$ID_Ginasio','$ID_Utilizadores', '$Hora_entrada','$Hora_saida','$Dia')";

         mysqli_query($conn, $insert);
         echo "<script> alert('Esgaca'); </script>";
      }
   }

};


?>

<div class="form-container">

<form action="" method="post">
   <h3>Adcionar Acessos</h3>
   <?php
   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      };
   };
   ?>
   <input type="ID_Ginasio" name="ID_Ginasio" required placeholder="Digite o seu ID_Ginasio">
   <input type="ID_Utilizadores" name="ID_Utilizadores" required placeholder="Digite o seu ID_Utilizadores">
   <input type="Hora_entrada" name="Hora_entrada" required placeholder="Digite o sua hora de entrada no GYMENERGY">
   <input type="Hora_saida" name="Hora_saida" required placeholder="Digite o sua hora de entrada no GYMENERGY">
   <input type="Dia" name="Dia" required placeholder="Digite o Dia">


   </select>
   <input type="submit" name="adcionar_acesso" value="adcionar" class="form-btn">

</form>

</div>
</div>







<?php
include "menu/footer.php"
?>

