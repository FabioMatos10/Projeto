
<?php
    session_start();
    require '../API/Domain/config.php';
    include "menu/menu.php"
?>

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="style.css">
   <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

   
   <?php
  
        if(isset($_POST["submit"])):
        $nome = $_POST["alterar"];
        $password = $_POST["password"];      
          $ID_Utilizadores = $_POST["ID_Utilizadores"];


        $conexao = new Conexao();
        $listar = $conexao->runQuery("SELECT * FROM utilizador WHERE ID_Utilizadores='$ID_Utilizadores'");
        $listar->execute();
        $lista = $listar->fetch(PDO::FETCH_ASSOC);

            $alterar = $conexao->runQuery("UPDATE utilizador SET nome='$nome' , password='$password' WHERE ID_Utilizadores='$ID_Utilizadores'");
            $alterar->execute();

            if($alterar):
                header("Location: index.php");
            endif;

        endif;

    ?>

<div class="form-container">

   <form method="post" action="">
      <h3>Alterar dados</h3>
      <input  id="nome" type="nome" name="nome" required>
      <input  id="alterar" type="text" name="alterar" required placeholder="Digite o nome que deseja mudar">
      <input id="password" type="text" name="password" required  readonly>
      <input  type="password" name="password" required placeholder="Digite a password que deseja mudar">
      <input  type="password" name="cpassword" required placeholder="confirme a sua password">
      <input  id="ID_Utilizadores" name="ID_Utilizadores" required placeholder="confirme a sua password">



      </select>
      <input id="submit" name="submit" type="submit" value="Alterar dados" class="form-btn" onclick="guardarcokies()">
   </form>

</div>
<script src="perfil.js"></script>
<?php
include "menu/footer.php"

?>