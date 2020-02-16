<?php

require_once 'vendor/autoload.php';

$template = file_get_contents('App/Template/estrutura.html');

ob_start();
$core = new App\Core\Core;
$core->start($_GET);
$resultado = ob_get_contents();
ob_end_clean();

$tmpPronto = str_replace('{{area_dinamica}}',$resultado,$template);
echo $tmpPronto;


