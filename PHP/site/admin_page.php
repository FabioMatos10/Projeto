<?php

require '../API/Domain/config.php';

session_start();




?>

<!DOCTYPE html>
<html lang="pt">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>GYMENERGY</title>

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="menu/style.css">
   
   


</head>
<body>


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

<script src="admin_page.js"></script>
</body>
<script src="admin_page.js"></script>

</html>