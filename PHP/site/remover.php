<?php   
    session_start();
    require '../API/Domain/config.php';
    $conexao = new Conexao();

    $Id_Utilizador= $_SESSION["ID_Utilizadores"];
    

    $delete = 'DELETE FROM utilizadores WHERE ID_Utilizadores = :ID_Utilizadores';
    $executar = $connect->prepare($delete);
    $executar->execute(array(':ID_Utilizadores' => $ID_Utilizadores));


    if($delete):
        header('Location: admin_page.php');
    endif;
?>