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
      <h3>Bem vindo, <span>admin</span></h3>
   <p id="nomeutilizador"></p>
     <p>Que tabela deseja adcionar dados???</p>

      <a href="adcionar_acess.php" class="btn">Acessos</a>
      <a href="adcionar_ativ.php" class="btn">Atividades</a>
      <a href="adicionar_ginasios.php" class="btn">Ginasios</a>
      <a href="adcionar_aulas.php" class="btn">Aulas</a>
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
                <th>Permissão</th>
                <th>Remover</th>
                <th>Editar</th>

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
include "menu/footer.php"
?>

