<?php

require '../API/Domain/config.php';

session_start();


include "menu/menu.php"




?>
   <link rel="stylesheet" href="css/style_adminpage.css">
   <link rel="stylesheet" href="menu/style.css">
   <link rel="stylesheet" href="menu/style1.css">
   

<div class="container">

   <div class="content">
      <h3>Ola, <span>admin</span></h3>
      <h1>Boas <p id="nomeutilizador"></p></h1>
      <p>Aqui só estão os maiores</p>
      <a href="login_form.php" class="btn">login</a>
      <a href="register_form.php" class="btn">register</a>
      <a href="logout.php" class="btn">logout</a>
   </div>

</div>

<div class="table_responsive">
            <table>
            <thead>
                <tr>
                <th>ID_Utilizadores</th>
                <th>nome</th>
                <th>email</th>
                <th>password</th>

                </tr>
            </thead>
            <tbody>
            <?php
        
                $conexao = new Conexao();
                $listagem = $conexao->runQuery("SELECT * FROM utilizador");
                $listagem->execute();
                while($lista = $listagem->fetch(PDO::FETCH_ASSOC)):
            ?>

            <tr>
                <td><?php echo $lista["ID_Utilizadores"]; ?></td>
                <td><?php echo $lista["nome"]; ?></td>
                <td><?php echo $lista["email"]; ?></td>
                <td><?php echo $lista["password"]; ?></td>
                <td><?php echo $lista["permissao"]; ?></td>
                <td><a href="remover.php?id=<?php echo $lista["ID_Utilizadores"]; ?>"><button class="button1">Remover</button></a></td>
                <td><a href="editar.php?id=<?php echo $lista["ID_Utilizadores"]; ?>"><button class="button1">Editar</button></a></td>
            
            <?php
                endwhile;
            ?>
            </tbody>
            </table>
        </div>
        </div>
        <script type="text/javascript" src="admin_page.js"></script>



<?php
 




         if(isset($_POST['adcionar_ginasios'])){
            echo "<script> alert('Esgaca'); </script>";
            $conn = mysqli_connect('localhost','root','','pap');
            $NomeGinasio = ($_POST['NomeGinasio']);
            $Localidade = ($_POST['Localidade']);



         
            $select = " SELECT * FROM ginasio WHERE NomeGinasio = '$NomeGinasio' && Localidade = '$Localidade' ";
           
            $result = mysqli_query($conn, $select);

            if(mysqli_num_rows($result) > 0){

               $error[] = 'Ja existe esse ginasio!';

            }else{

               if($Localidade != $Localidade){
                  $error[] = 'ja existe essa atividade';
               }else{
            
                  $insert = "INSERT INTO ginasio(NomeGinasio, Localidade) VALUES($NomeGinasio,$Localidade)";
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

</div>





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
   <input type="NomeAtividade" name="NomeAtividade" required placeholder="Nome da Atividade">
   <input type="NomeAula" name="NomeAula" required placeholder="Nome da Aula">


   </select>
   <input type="submit" name="adcionar_aula" value="adcionar" class="form-btn">

</form>

</div>
</div>





         <?php
         $conn = mysqli_connect('localhost','root','','pap');




         if(isset($_POST['adcionar_ativ'])){

            $ID_Ginasio = ($_POST['ID_Ginasio']);
            $NomeAtividade = ($_POST['NomeAtividade']);



            $select = " SELECT * FROM atividades WHERE ID_Ginasio = '$ID_Ginasio' && NomeAtividade = '$NomeAtividade' ";

            $result = mysqli_query($conn, $select);

            if(mysqli_num_rows($result) > 0){

               $error[] = 'Ja existe essa atividade!';

            }else{

               if($NomeAtividade != $NomeAtividade){
                  $error[] = 'ja existe essa atividade';
               }else{
                  $insert = "INSERT INTO atividades(ID_Ginasio, ID_Ginasio) VALUES('$ID_Ginasio','$ID_Ginasio')";
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

