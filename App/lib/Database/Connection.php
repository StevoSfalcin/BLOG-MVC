<?php

namespace App\lib\Database;

abstract class Connection{
    private static $con;
    public static function getCon(){
        self::$con = new \PDO('mysql:host=localhost; dbname=blog;','root','');
        return self::$con;
    }
}