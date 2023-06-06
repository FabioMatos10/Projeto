<?php

@include 'config.php';
session_start();
?>


   <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>



   <link rel="stylesheet" href="css/style.css">

   <link rel="stylesheet" href="style.css">


<?php
include "./menu/menu.php";
?>

<div class="form-container">

   <form >
      <h3>Login</h3>
   
      <input id="email" type="email" name="email" required placeholder="Digite o seu email">
      <input id="password" type="password" name="password" required placeholder="Digite a sua password" >
      <input id="submit" type="button" value="login " class="form-btn">
   <p>Não tem conta?? <a href="register_form.php">Resgisto</a></p>
   </form>

</div>

<script src="login.js"></script>
<?php
include "menu/footer.php";
?>