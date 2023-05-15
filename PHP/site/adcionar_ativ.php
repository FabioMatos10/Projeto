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




         if(isset($_POST['adcionar_ativ'])){

            $ID_Ginasio = ($_POST['ID_Ginasio']);
            $NomeAtividade = ($_POST['NomeAtividade']);



            $select = " SELECT * FROM atividades WHERE ID_Ginasio = '$ID_Ginasio' && NomeAtividade = '$NomeAtividade' ";

            $result = mysqli_query($conn, $select);

            if(mysqli_num_rows($result) > 0){

       

            }else{

               if($NomeAtividade != $NomeAtividade){
                  $error[] = 'ja existe essa atividade';
               }else{
                  $insert = "INSERT INTO atividades(ID_Ginasio, NomeAtividade) VALUES('$ID_Ginasio','$NomeAtividade')";
                  mysqli_query($conn, $insert);

               }
            }

         };


         ?>

<div class="form-container">

<form action="" method="post">
   <h3>Adcionar Atividade</h3>
   <?php
   if(isset($error)){
      foreach($error as $error){
         echo '<span class="error-msg">'.$error.'</span>';
      };
   };
   ?>
   <input type="ID_Ginasio" name="ID_Ginasio" required placeholder="Digite o seu ID_Ginasio">
   <input type="NomeAtividade" name="NomeAtividade" required placeholder="Nome da Atividade">



   </select>

   <input type="submit" name="adcionar_ativ" value="adcionar" class="form-btn">
 
</form>

</div>

</div>







<?php
include "menu/footer.php"
?>

