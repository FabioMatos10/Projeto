<?php

@include 'config.php';

session_start();
if(!isset($_SESSION['user_name'])){
   header('location:login_form.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>user page</title>


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
              <li>
            </ul>
          </div>
      </li>
        <li><a href="#">NOVIDADES</a>
        </li> 
        <li><a href="#">ADESÃO</a></li>
        <li><?php echo $_SESSION['user_name'] ?></li>
      </ul>

    </div>  
   


</body>
</html>