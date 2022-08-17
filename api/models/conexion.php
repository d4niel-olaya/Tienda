<?php
require_once 'config/config.php';

class Database{
    
    private static $conexion;
    public static function Connect(){
        self::$conexion = mysqli_connect(constant('HOST'),constant('USER'), constant('PASSWORD'), constant('DB'));
        return self::$conexion;

    }
}