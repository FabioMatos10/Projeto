<?php

require 'config.php';

class Utilizador {

    function carregar_dados($ID_Utilizadores){

        $conexao = new Conexao();

        $stmt = $conexao->runQuery('SELECT * FROM utilizador WHERE ID_Utilizadores = :ID_Utilizadores');
        $stmt->execute(array(':ID_Utilizadores' => $ID_Utilizadores));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($data == false) {
            return "nulo";
        }else{
            $verificardados=array('ID_Utilizadores' => $data['ID_Utilizadores'],'nome' => $data['nome'],'email' => $data['email'],'password' => $data['password'],'permissao' => $data['permissao']);
            return $verificardados;
            
        }
    }
}
