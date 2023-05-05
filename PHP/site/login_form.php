<?php

@include 'config.php';

session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);



   $select = " SELECT * FROM Utilizador WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $row = mysqli_fetch_array($result);

      if($row['permissao'] == 'admin'){

         $_SESSION['admin_name'] = $row['nome'];
         header('location:admin_page.php');

      }else{

      

         $_SESSION['user_name'] = $row['nome'];
         header('location:index.php');

      }
     
   }else{
      $error[] = 'O email ou a password estão erradas !';
   }

};
?>

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
   <title>GYMENERGY</title>


   <link rel="stylesheet" href="css/style.css">

   <link rel="stylesheet" href="style.css">

</head>
<body>



<div class="form-container">

   <form >
      <h3>Login</h3>
   
      <input id="email" type="email" name="email" required placeholder="Digite o seu email">
      <input id="password" type="password" name="password" required placeholder="Digite a sua password" >
      <input id="submit" type="submit" value="login " class="form-btn">
   <p>Não tem conta?? <a href="register_form.php">Resgisto</a></p>
   </form>

</div>

<script src="login.js"></script>
<?php
include "menu/footer.php";
?>