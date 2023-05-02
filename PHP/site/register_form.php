<?php

@include 'config.php';



if(isset($_POST['submit'])){

   $nome = mysqli_real_escape_string($conn, $_POST['nome']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = md5($_POST['password']);
   $cpass = md5($_POST['cpassword']);
   $permissao = $_POST['permissao'];

   $select = " SELECT * FROM utilizador WHERE email = '$email' && password = '$pass' ";

   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){

      $error[] = 'Ja existe esse utilizador!';

   }else{

      if($pass != $cpass){
         $error[] = 'nao correspodem as passwords!';
      }else{
         $insert = "INSERT INTO utilizador(nome, email, password, permissao) VALUES('$nome','$email','$pass','$permissao')";
         mysqli_query($conn, $insert);
         header('location:login_form.php');
      }
   }

};


?>

<?php
include "menu/menu.php"
?>


<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>GYMENERGY</title>


   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="style.css">

</head>
<body>

<div class="form-container">

   <form action="" method="post">
      <h3>Registo</h3>
      <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
      <input type="text" name="nome" required placeholder="Digite o seu nome">
      <input type="email" name="email" required placeholder="Digite o seu email">
      <input type="password" name="password" required placeholder="Digite a password">
      <input type="password" name="cpassword" required placeholder="confirme a sua password">


      </select>
      <input type="submit" name="submit" value="registo" class="form-btn">
      <p>Já tem conta? <a href="login_form.php">Login</a></p>
   </form>

</div>
<?php
include "menu/footer.php"

?>