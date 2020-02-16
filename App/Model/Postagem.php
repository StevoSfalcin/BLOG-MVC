<?php

namespace App\Model;

class Postagem{
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

    public static function selecionaPorId($id){
        //Conexao com o DB
        $con = \App\lib\Database\Connection::getCon();
        //Acao
        $query = "SELECT * FROM postagem WHERE id = ?";
        $sql = $con->prepare($query);
        $sql->bindValue(1,$id);
        $sql->execute();

        $resultado = $sql->fetchObject();

        //Retorna resultado
        return $resultado;


    }
}