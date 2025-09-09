<?php
//Carga controladors
require("controllers/users.php");
//Fin carga controladors
class Routing {
    //Crearem un array amb les rutes
    private $routes = [
        "/" => ["Inici","main.php",false],
        "/users" => ["Users","users.php",true,"GET"],
        "/user" => ["Users","newuser.php",true,"POST"],
    ];

    public function __construct(){
        $req = $_SERVER["REQUEST_URI"];
        //Obtenir el mètode emprat
        $metode = $_SERVER["REQUEST_METHOD"];
        //Localitzem el directori de muntatge per obtenir la ruta
        $reqSplit = explode('/phpapi', $req);
        //Treballem només amb la ruta
        $req = (isset($reqSplit[1])) ? $reqSplit[1] : "/";
        //Si la ruta no comenca amb / la afegim
        if(!str_starts_with($req, '/')){
			$req = '/' . $req;
		}
        
        //Filtrem que no tingui en compte els parametres
        $part = explode('?', $req);
		$req = $part[0];
        
        //Carreguem vista
        if(isset($this->routes[$req])) {
            //Filtrem si la ruta no te mètode definit o si en te, el mètode coincideix
            if(!isset($this->routes[$req][3]) || $this->routes[$req][3] == $metode) {
                include 'public/' . $this->routes[$req][1];
            }
        } else {
            include 'public/404.php';
        }
	}

    public static function params() {
        $req = $_SERVER["REQUEST_URI"];
        $paramsResponse = [];
        //Localitzem el directori de muntatge per obtenir la ruta
        $reqSplit = explode('/phpapi', $req);
        //Treballem només amb la ruta
        $req = (isset($reqSplit[1])) ? $reqSplit[1] : "/";
        //Si la ruta no comenca amb / la afegim
        if(!str_starts_with($req, '/')){
            $req = '/' . $req;
        }
        //Recuperem els parametres
        $part = explode("?", $req);
        if(isset($part[1])){
			$params = explode('&',$part[1]);
            //Els situem en l'array que retornem
			foreach($params as $param){
				$keyValue = explode('=', $param);
				$paramsResponse[$keyValue[0]] = $keyValue[1];
			}
		}

        //Recuperem els paràmetres Post i els situem en l'array
        $paramsResponse = array_merge($paramsResponse, $_POST);
		return $paramsResponse;
    }
}