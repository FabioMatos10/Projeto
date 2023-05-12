


<?php
include "menu/menu.php"
?>
   <link rel="stylesheet" href="css/style.css">
   <link rel="stylesheet" href="style.css">
   <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

<div class="form-container">

   <form>
      <h3>Alterar dados</h3>
      <input  id="nome" type="nome" name="nome_alterado" required placeholder="Digite o nome que deseja mudar">
      <input id="password" type="text" name="password" required placeholder="Digite a password" readonly>
      <input  type="password" name="password" required placeholder="Digite a password que deseja mudar">
      <input  type="password" name="cpassword" required placeholder="confirme a sua password">


      </select>
      <input id="submit" type="button" value="Alterar dados" class="form-btn">
   </form>

</div>
<script src="perfil.js"></script>
<?php
include "menu/footer.php"

?>