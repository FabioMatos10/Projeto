
<?php
include "menu/menu.php"
?>
   <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
   <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="style.css">


<div class="form-container">

   <form>
      
      <h3>Registo</h3>

      <input id="nome" type="nome" name="nome" required placeholder="Digite o seu nome">
      <input id="email" type="email" name="email" required placeholder="Digite o seu email">
      <input id="password" type="password" name="password" required placeholder="Digite a password">
      <input id="cpassword" type="password" name="cpassword" required placeholder="confirme a sua password">


      </select>
      <input id="submit" type="button" value="Registo " class="form-btn">
      <p>Já tem conta? <a href="login_form.php">Login</a></p>
   </form>

</div>
<script src="registo.js"></script>
<?php
include "menu/footer.php"

?>