<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost", "apiphp", "@Ciber2025", "bbddapi");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>