<?php

require '../API/Domain/config.php';

session_start();




?>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="menu/style.css">
   

<div class="menu-bar">
      <h1 class="logo">GYM<span>ENERGY</span></h1>
      <ul>


        <li><a href="#">SOBRE NÓS<i class="fas fa-caret-down"></i></a>
            <div class="dropdown-menu">
                <ul>
                  <li><a href="historia.php">A nossa história</a></li>
                  <li><a href="pricing.php">Pricing</a></li>

                  <li>
                </ul>
              </div>
        </li>
        <li><a href="#">GINASIOS<i class="fas fa-caret-down"></i></a>
          <div class="dropdown-menu">
              <ul>
                <li><a href="estarreja_tribo.php">Estarreja</a></li>
                <li><a href="ovar.php">Ovar</a></li>
                <li><a href="avanca.php">Avanca </a></li>

                <li>
              </ul>
            </div>
      </li>
      <li><a href="#">TREINAR<i class="fas fa-caret-down"></i></a>
        <div class="dropdown-menu">
            <ul>
              <li><a href="#">No ginasio</a></li>
              <li><a href="#">Aulas de grupo</a></li>
              <li><a href="#">Mapas de aulas </a></li>
              <li><a href="#">Planos de treino</a></li>
              <li><a href="#">Personal Training</a></li>
              <li><a href="nutricao.php">Nutrição</a></li>
              <li><a id="nomeutilizador"></a></li>
            </ul>
          </div>
      </li>
        <li><a href="#">NOVIDADES</a>
        </li> 
        <li><a href="#">ADESÃO</a></li>
        <li></li>
      </ul>

    </div>  
<div class="container">

   <div class="content">
      <h3>Ola, <span>admin</span></h3>
      <h1>Boas <span id="nomeutilizador"></span></h1>
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

        <?php
$conn = mysqli_connect('localhost','root','','pap');




if(isset($_POST['submit'])){

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
         $insert = "INSERT INTO atividades(NomeGinasio, Localidade) VALUES('$NomeGinasio','$Localidade')";
         mysqli_query($conn, $insert);

      }
   }

};


?>

<div class="form-container">

   <form >
      <h3>Adcionar um ginasio</h3>
   
      <input id="NomeGinasio" type="NomeGinasio" name="NomeGinasio" required placeholder="NomeGinasio" >
      <input id="Localidade" type="Localidade" name="Localidade" required placeholder="Localidade " >
      <input id="submit" type="button" value="Adcionar " class="form-btn">
   </form>

</div>
<?php
$conn = mysqli_connect('localhost','root','','pap');




if(isset($_POST['submit'])){

   $ID_Ginasio = ($_POST['ID_Ginasio']);
   $DataAula = ($_POST['DataAula']);



   $select = " SELECT * FROM atividades WHERE ID_Ginasio = '$ID_Ginasio' && DataAula = '$DataAula' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Ja existe essa atividade!';

   }else{

      if($DataAula != $DataAula){
         $error[] = 'ja existe essa atividade';
      }else{
         $insert = "INSERT INTO atividades(ID_Ginasio, DataAula) VALUES('$ID_Ginasio','$DataAula')";
         mysqli_query($conn, $insert);

      }
   }

};


?>

<div class="form-container">

   <form >
      <h3>Adcionar Aulas </h3>
   
      <input id="ID_Ginasio" type="ID_Ginasio" name="ID_Ginasio" required placeholder="ID_Ginasio" >
      <input id="DataAula" type="DataAula" name="DataAula" required placeholder="Data Aula " >
      <input id="NomeAula" type="NomeAula" name="NomeAula" required placeholder="Nome Aula " >
      <input id="submit" type="button" value="Adcionar " class="form-btn">
   </form>

</div>
<?php
$conn = mysqli_connect('localhost','root','','pap');




if(isset($_POST['submit'])){

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

   <form >
      <h3>Adcionar Atividades</h3>
   

      <input id="ID_Ginasio" type="ID_Ginasio" name="ID_Ginasio" required placeholder="ID_Ginasio" >
      <input id="NomeAtividade" type="NomeAtividade" name="NomeAtividade" required placeholder="NomeAtividade " >
      <input id="submit" type="button" value="Adcionar " class="form-btn">
      <input type="submit" name="submit" value="registo" class="form-btn">
   </form>

</div>

<script src="login.js"></script>

<script src="admin_page.js"></script>
</body>
<script src="admin_page.js"></script>
<?php
include "menu/footer.php";
?>
