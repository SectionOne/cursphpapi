<?php
require_once("./db/connectDb.php");

class users{
    //Constructor per connectar a la base de dades
    public function __construct(){

	}
    public static function readUser(){
        $db=Conectar::conexion();
        $queryUserData = $db->query("select * from users ");
        return $queryUserData;
    }
}
?>