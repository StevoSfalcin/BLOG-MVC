<?php
namespace App\Controller;

use Exception;

class AdminController{
    public function index(){
        //Resultados do Model Postagem
        $postagens = \App\Model\Postagem::selecionaTodos();
        //Twig
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('admin.html');

        //Coloca resultados no array $resultados
        $resultados = array();
        $resultados['postagens'] = $postagens;

        //Retorna View home com valores do $resultados
        echo $template->render($resultados);
    }

    public function create(){
        //Twig
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('create.html');

        $resultado = array();

        echo $template->render($resultado);
    }

    public function insert(){
        try{
            \App\Model\Postagem::insert($_POST);
            echo '<script>alert("Publicacao inserida com sucesso");</script>';
            echo '<script>location.href="http://portfolio/MVC/?pagina=admin&metodo=index";</script>';
        }catch(Exception $e){
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://portfolio/MVC/?pagina=admin&metodo=create";</script>';

        }

    }

    public function alterar($id){
        //Resultados do Model Postagem
        $postagem = \App\Model\Postagem::selecionaPorId($id);
        //Twig
        $loader = new \Twig\Loader\FilesystemLoader('App/View');
        $twig = new \Twig\Environment($loader);
        $template = $twig->load('alterar.html');

        $resultado = array();
        $resultado['titulo'] = $postagem->titulo;
        $resultado['conteudo'] = $postagem->conteudo;
        $resultado['id'] = $postagem->id;

        echo $template->render($resultado);
    }

    public function modifica(){
        try{
            \App\Model\Postagem::altera($_POST);
            echo '<script>alert("Publicacao modificada com sucesso");</script>';
            echo '<script>location.href="http://portfolio/MVC/?pagina=admin&metodo=index";</script>';
        }catch(Exception $e){
            echo '<script>alert("'.$e->getMessage().'");</script>';
            echo '<script>location.href="http://portfolio/MVC/?pagina=admin&metodo=create";</script>';

        }

    }

}