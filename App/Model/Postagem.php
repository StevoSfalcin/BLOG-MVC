<?php

namespace App\Model;

use Exception;

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


    public static function insert($urlPost){
        if(empty($urlPost['titulo']) OR empty($urlPost['conteudo'])){
            throw new Exception("Preencha todos os campos");
            return false;
        }
        //Conexao com o DB
        $con = \App\lib\Database\Connection::getCon();
        //Acao
        $query = "INSERT INTO postagem (titulo,conteudo) VALUES (?,?)";
        $sql = $con->prepare($query);
        $sql->bindValue(1,$urlPost['titulo']);
        $sql->bindValue(2,$urlPost['conteudo']);
        $result = $sql->execute();

        if($result == 0){
        throw new Exception("Erro ao inserir");
        return false;
        }
        return true;
    
    }

}
