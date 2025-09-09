<?php
require_once("./db/connectDb.php");

class users{
    //Constructor per connectar a la base de dades
    public function __construct(){

	}
    public static function readUser($idUser = -1){
        $db=Conectar::conexion();
        $filterId = ($idUser == -1) ? "" : "where id = '" . $idUser . "' limit 1";
        $queryUserData = $db->query("select * from users " . $filterId);
        return $queryUserData;
    }
    public static function createUser($nom,$email,$clau){
		$db=Conectar::conexion();
        $queryInsertUser = "INSERT INTO users (nom,email,clau,status) VALUES ('" . $nom . "','" . $email . "','" . $clau . "',0)";
		$newUser=$db->query($queryInsertUser);
        return $newUser;
	}
}
?>