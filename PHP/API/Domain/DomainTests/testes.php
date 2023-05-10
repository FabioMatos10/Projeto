<?php

require '../dados_utilizador.php';

EValido_TestVazio(); 
echo "<br>";
EValido_TestUtilizadorNaoExiste();
echo "<br>";
testeadminexiste();
echo "<br>";
echo "<br>";
utlizadorjaexiste();
echo "<br>";
passesiguais();
echo "<br>";
utlizadorinserido();

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


function utlizadorjaexiste(){
    $utilizador = new Utilizador();
    $result = $utilizador->novoresgisto("fabio","fabio@gmail.com","fabio123","fabio123");
    echo "utlizadorjaexiste - expected:"."utilizadorjaexiste"." VS real:".json_encode($result);

}

function passesiguais(){
    $utilizador = new Utilizador();
    $result = $utilizador->novoresgisto("aaa","aaa@aaa.com","aaaasasas","fabio123");
    echo "utlizadorjaexiste - expected:"."palavraspassesdiferentes"." VS real:".json_encode($result);

}

function utlizadorinserido(){
    $utilizador = new Utilizador();
    $result = $utilizador->novoresgisto("aaa","aaa@aaa.com","aaa","aaa");
    echo "utlizadorjaexiste - expected:"."true"." VS real:".json_encode($result);

}