<?php

namespace App\Core;

class Core{
    public function start($urlGet){
        //Define qual sera a controller
        if (isset($urlGet['pagina'])) {
            $controller = ucfirst($urlGet['pagina'].'Controller');
        } else {
            $controller = 'HomeController';
        }      
        if (!class_exists('\\App\\Controller\\'.$controller)) {
            $controller = 'ErroController';
        }
        //Define o metodo
        if(isset($urlGet['metodo'])){
            $acao = $urlGet['metodo'];
        }
        else{
            $acao = 'index';
        }
        //Define ID
        if(isset($urlGet['id'])){
            $id = $urlGet['id'];
        }
        else{
            $id = null;
        }
        //Adiciona Namespace
        $namespace = '\\App\\Controller\\'.$controller;

        call_user_func_array(array(new $namespace, $acao),array('id' => $id));


    }
}

