<?php
require_once("./db/connectDb.php");

class photos{
    public function __construct(){

	}

    public static function readPhotos($idUser = -1){
        $db=Conectar::conexion();
        //Filtrem si volem les imatges d'un usuari o de tothom
        $filterId = ($idUser == -1) ? "" : "where idUser = '" . $idUser . "'";
        $queryUserData = $db->query("select id from photos " . $filterId);
        return $queryUserData;
    }

    public static function seePhoto($idPhoto = -1){
        $db=Conectar::conexion();
        if($idPhoto != -1) {
            $queryUserData = $db->query("select file from photos where id = '" . $idPhoto . "' limit 1");
            $row = $queryUserData->fetch_assoc();
            $path = "assets/img/" . $row['file'];
            if (file_exists($path)) {
                return $path;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}