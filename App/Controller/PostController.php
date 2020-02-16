<?php

namespace App\Controller;

class PostController{
    public function index($id){
        $resultado = \App\Model\Postagem::selecionaPorId($id);
        
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('post.html');

        $result = array();
        $result['titulo'] = $resultado->titulo;
        $result['conteudo'] = $resultado->conteudo;


        //echo $template->render($resultado);
        echo $template->render($result);

        
    }

}