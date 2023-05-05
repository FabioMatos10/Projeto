<?php   
    session_start();
    require '../API/Domain/config.php';
    $conexao = new Conexao();

    $ID_Utilizador= $_GET["ID_Utilizador"];

    $delete = $conexao->runQuery("DELETE FROM Utilizador WHERE ID_Utilizador ='$ID_Utilizador'");
    $delete->execute();

    if($delete):
        header('Location: admin_page.php');
    endif;
?>