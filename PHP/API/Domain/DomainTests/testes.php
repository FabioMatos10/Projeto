<?php

require '../dados_utilizador.php';

EValido_TestVazio(); 
echo "<br>";
EValido_TestUtilizadorNaoExiste();
echo "<br>";
testeadminexiste();



function EValido_TestVazio(){
    $utilizador = new Utilizador();
    $result = $utilizador->UtilizadorEValido("","");
    echo "EValido_TestVazio - expected:"."false"." VS real:".json_encode($result);
}

function EValido_TestUtilizadorNaoExiste(){
    $utilizador = new Utilizador();
    $result = $utilizador->UtilizadorEValido("dsgd@asg.com","fsdfasd");
    echo "EValido_TestUtilizadorNaoExists - expected:"."false"." VS real:".json_encode($result);
}

function testeadminexiste(){
    $utilizador = new Utilizador();
    $result = $utilizador->UtilizadorEValido("rui@gmail.com","202cb962ac59075b964b07152d234b70");
    echo "EValido_TestUtilizadorExiste - expected:"."user"." VS real:".json_encode($result);
}
