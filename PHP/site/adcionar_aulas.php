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




if(isset($_POST['adcionar_aula'])){

   $ID_Ginasio = ($_POST['ID_Ginasio']);
   $DataAula = ($_POST['DataAula']);
   $NomeAula = ($_POST['NomeAula']);



   $select = " SELECT * FROM aulas WHERE ID_Ginasio = '$ID_Ginasio' && DataAula = '$DataAula' && NomeAula = '$NomeAula' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Ja existe essa atividade!';

   }else{

      if($DataAula != $DataAula){
         $error[] = 'ja existe essa atividade';
      }else{
         $insert = "INSERT INTO aulas(ID_Ginasio, DataAula, NomeAula) VALUES('$ID_Ginasio','$DataAula', '$NomeAula')";
         mysqli_query($conn, $insert);

      }
   }

};


?>

<div class="form-container">

<form action="" method="post">
   <h3>Adcionar Aulas</h3>
   <?php
   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      };
   };
   ?>
   <input type="ID_Ginasio" name="ID_Ginasio" required placeholder="Digite o seu ID_Ginasio">
   <input type="DataAula" name="DataAula" required placeholder="Data da Aula">
   <input type="NomeAula" name="NomeAula" required placeholder="Nome da Aula">


   </select>
   <input type="submit" name="adcionar_aula" value="adcionar" class="form-btn">

</form>

</div>
</div>





<?php
include "menu/footer.php"
?>

