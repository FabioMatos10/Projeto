<?php   
    session_start();
    require '../API/Domain/config.php';
    $conexao = new Conexao();

    $ID_Utilizadores= $_GET["id"];
    

    $delete = 'DELETE FROM utilizador WHERE ID_Utilizadores = :ID_Utilizadores';
    $executar = $conexao->runQuery($delete);
    $executar->execute(array(':ID_Utilizadores' => $ID_Utilizadores));


    if($delete):
        header('Location: admin_page.php');
    endif;
?>