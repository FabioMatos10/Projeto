<?php
    session_start();
    require '../API/Domain/config.php';
?>

<html>
<head>
    <meta charset='UTF-8'/>
    <title></title>
    <link rel="stylesheet" href="css\style_edit.css">
</head>

<body>
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
            $nome = $_POST["email"];
            $password = $_POST["password"];
            $password = $_POST["permissao"];

            $alterar = $pdo->runQuery("UPDATE utilizador SET nome='$nome' , email='$email' , password='$password' , permissao='$permissao' WHERE ID_Utilizadores='$ID_Utilizadores'");
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
                <input type="text" name="email" placeholder="email" value="<?php echo $lista["email"]; ?>" autofocus>
                <input type="password" name="password" placeholder="Password" value="<?php echo $lista["password"]; ?>">
                <input type="text" name="permissao" placeholder="permissao" value="<?php echo $lista["permissao"]; ?>" autofocus>
                <input type="submit" class="btn btn-primary" value="EDITAR" name="editar">
            </form>

        </div>
    </section>

</body>
</html>