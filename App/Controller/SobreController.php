<?php

namespace App\Controller;

class SobreController{
    public function index(){
        $template = file_get_contents('App/View/sobre.html');
        echo $template;


    }

}