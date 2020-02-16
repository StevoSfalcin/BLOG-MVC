<?php

namespace App\Controller;

class HomeController{
    public function index(){
        //Seleciona todas postagens
        $postagens = \App\Model\Postagem::selecionaTodos();

        //Twig
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('home.html');

        //Coloca resultados no array $resultados
        $resultados = array();
        $resultados['postagens'] = $postagens;

        //Retorna View home com valores do $resultados
        echo $template->render($resultados);

    }
}