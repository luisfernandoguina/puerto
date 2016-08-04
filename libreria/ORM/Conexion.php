<?php

class Conexion{
    public static function conectar(){
        try {
            $params = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");  
            $cn = new PDO("mysql:host=".HOST.";dbname=".DB, USER, PASSWORD, $params);
            return $cn;
        }catch (PDOException $ex){
            //die($ex->getMessage());
        }
    }
}
