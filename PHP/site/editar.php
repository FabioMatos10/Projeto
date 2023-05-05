<?php
    session_start();
    require '../API/Domain/config.php';
?>

<html>
<head>
    <meta charset='UTF-8'/>
    <title>88 God's</title>
    <link rel="stylesheet" href="css\style_edit.css">
</head>

<body>
    <?php
         $conexao = new Conexao();
        if(isset($_GET["ID_Utilizador"])):
            $ID_Utilizador = $_GET["ID_Utilizador"];
        endif;

        $listar = $conexao->runQuery("SELECT * FROM Utilizador WHERE ID_Utilizador='$ID_Utilizador'");
        $listar->execute();
        $lista = $listar->fetch(PDO::FETCH_ASSOC);

        if(isset($_POST["editar"])):
            $nome = $_POST["ID_Utilizador"];
            $password = $_POST["password"];

            $alterar = $conexao->runQuery("UPDATE Utilizador SET nome='$nome' , password='$password' WHERE ID_Utilizador='$ID_Utilizador'");
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