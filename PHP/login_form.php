<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);



   $select = " SELECT * FROM lala WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['permissao'] == 'admin'){

         $_SESSION['admin_name'] = $row['nome'];
         header('location:admin_page.php');

      }else{

      

         $_SESSION['user_name'] = $row['nome'];
         header('location:index.html');

      }
     
   }else{
      $error[] = 'O email ou a password estão erradas !';
   }

};
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>GymEnergy</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

   <link rel="stylesheet" href="style.css">

</head>
<body>
<div class="menu-bar">
<h1 class="logo"><a href="index.html"> GYM<span>ENERGY</span></h1></a>
      <ul>

        <li><a href="#">SOBRE NÓS<i class="fas fa-caret-down"></i></a>
            <div class="dropdown-menu">
                <ul>
                  <li><a href="no_giansio_historia.html">A nossa história</a></li>
                  <li><a href="#">Pricing</a></li>

                  <li>
                </ul>
              </div>
        </li>
        <li><a href="#">GINASIOS<i class="fas fa-caret-down"></i></a>
          <div class="dropdown-menu">
              <ul>
                <li><a href="#">Estarreja</a></li>
                <li><a href="#">Ovar</a></li>
                <li><a href="#">Avanca </a></li>

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
              <li><a href="#">Nutrição</a></li>
              <li>
            </ul>
          </div>
      </li>
        <li><a href="#">NOVIDADES</a>
        </li> 
        <li><a href="#">ADESÃO</a></li>
        <li><a href="register_form.php">Registo</a></li>
      </ul>
    </div>
   
    </div>


<div class="form-container">

   <form action="" method="post">
      <h3>Login</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="email" name="email" required placeholder="Digite o seu email">
      <input type="password" name="password" required placeholder="Digite a sua password" >
      <input type="submit" name="submit" value="login " class="form-btn">
   <p>Não tem conta?? <a href="register_form.php">Resgisto</a></p>
   </form>

</div>

<footer class="footer-distributed">

        <div class="footer-left">
            <h3>Gym<span>Energy</span></h3>

            <p class="footer-links">
                <a href="#">No ginasio</a>
                |
                <a href="#">GINASIOS</a>
                |
                <a href="#">TREINAR</a>
                |
                <a href="#">NOVIDADES</a>
                  |
                <a href="#">ADESÃO</a>
                |
                <a href="#">Registo</a>

            </p>

        </div>

        <div class="footer-center">
            <div>
                <i class="fa fa-map-marker"></i>
                <p><span>Aveiro</span>
                    Estarreja</p>
            </div>

            <div>
                <i class="fa fa-phone"></i>
                <p>+967890109</p>
            </div>
            <div>
                <i class="fa fa-envelope"></i>
                <p><a href="a.fmatos25044@aeestarreja.pt">a.fmatos25044@aeestarreja.pt</a></p>
            </div>
        </div>
        <div class="footer-right">
            <p class="footer-company-about">
                <span>Sobre o ginasio</span>
               Ginasio novo, com objetivo de ser o melhor ginasio de Portugal e talvez o melhor do mundo, oferece todo
               aos clientes.

            </p>
            <div class="footer-icons">
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a href="#"><i class="fa fa-instagram"></i></a>
                <a href="#"><i class="fa fa-linkedin"></i></a>
                <a href="#"><i class="fa fa-twitter"></i></a>
                <a href="#"><i class="fa fa-youtube"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>