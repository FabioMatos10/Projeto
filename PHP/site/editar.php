<?php
    session_start();
    require '../API/Domain/config.php';
?>

<html>
<head>
    <meta charset='UTF-8'/>
    <link rel="stylesheet" href="css\style_edit.css">
</head>

<body>
    <?php
         $conexao = new Conexao();
        if(isset($_GET["ID_Utilizadores"])):
            $ID_Utilizadores = $_GET["ID_Utilizadores"];
        endif;

        $listar = $conexao->runQuery("SELECT * FROM utilizador WHERE ID_Utilizadores='$ID_Utilizadores'");
        $listar->execute();
        $lista = $listar->fetch(PDO::FETCH_ASSOC);

        if(isset($_POST["editar"])):
            $nome = $_POST["nome"];
            $password = $_POST["password"];

            $alterar = $conexao->runQuery("UPDATE utilizador SET nome='$nome' , password='$password' WHERE ID_Utilizadores='$ID_Utilizadores'");
            $alterar->execute();

            if($alterar):
                header("Location: admin_page.php");
            endif;

        endif;

    ?>

    <section class="area-login">
        <div class="login">
            
            <div>
                <img src="logo.png">
            </div>

            <form method="post">
                <input type="text" name="nome" placeholder="nome" value="<?php echo $lista["nome"]; ?>" autofocus>
                <input type="password" name="password" placeholder="Password" value="<?php echo $lista["password"]; ?>">
                <input type="submit" class="btn btn-primary" value="EDITAR" name="editar">
            </form>

        </div>
    </section>

</body>
</html>