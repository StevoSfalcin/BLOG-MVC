<?php

namespace App\Model;

class postagem{
    public static function selecionaTodos(){
        //Conexao com o DB
        $con = \App\lib\Database\Connection::getCon();

        //Acao 
        $query = "SELECT * FROM postagem";
        $sql = $con->prepare($query);
        $sql->execute();

        $resultado = array();

        //Adiciona os resultados em $resultado
        while($row = $sql->fetchObject()){
            $resultado[] = $row;
        }

        //Retorna resultado
        return $resultado;
    }
}