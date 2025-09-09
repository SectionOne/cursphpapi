<?php
require_once("./db/connectDb.php");

class photos{
    public function __construct(){

	}

    public static function readPhotos($idUser = -1){
        $db=Conectar::conexion();
        //Filtrem si volem les imatges d'un usuari o de tothom
        $filterId = ($idUser == -1) ? "" : "where idUser = '" . $idUser . "' limit 1";
        $queryUserData = $db->query("select id from photos " . $filterId);
        return $queryUserData;
    }
}