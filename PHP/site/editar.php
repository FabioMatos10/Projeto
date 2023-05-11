<?php
    session_start();
    require '../API/Domain/config.php';
?>
<?php
include "menu/menu.php"


?>

    <link rel="stylesheet" href="css\style_edit.css">


    <?php
        if(isset($_GET["id"])):
            $ID_Utilizadores = $_GET["id"];
        endif;
        $conexao = new Conexao();
        $listar = $conexao->runQuery("SELECT * FROM utilizador WHERE ID_Utilizadores='$ID_Utilizadores'");
        $listar->execute();
        $lista = $listar->fetch(PDO::FETCH_ASSOC);

        if(isset($_POST["editar"])):
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $permissao = $_POST["permissao"];

            $alterar = $conexao->runQuery("UPDATE utilizador SET nome='$nome' , email='$email' , password='$password' , permissao='$permissao' WHERE ID_Utilizadores='$ID_Utilizadores'");
            $alterar->execute();

            if($alterar):
                header("Location: admin_page.php");
            endif;

        endif;

    ?>

    <section class="area-login">
        <div class="login">
            
            <div>
       
            </div>
            <h1>Editar dados</h1>
            <form method="post">
                <input type="text" name="nome" placeholder="nome" value="<?php echo $lista["nome"]; ?>" autofocus>
                <input type="text" name="email" placeholder="email" value="<?php echo $lista["email"]; ?>"autofocus >
                <input type="password" name="password" placeholder="Password" value="<?php echo $lista["password"]; ?>"autofocus>
                <input type="text" name="permissao" placeholder="permissao" value="<?php echo $lista["permissao"]; ?>"autofocus>
                <input type="submit" class="btn btn-primary" value="EDITAR" name="editar">
            </form>

        </div>
    </section>

    <?php
include "menu/footer.php"
?>