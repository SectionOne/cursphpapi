<?php
class Routing {
    //Crearem un array amb les rutes
    private $routes = [
        "/" => ["Inici","main.php",false],
    ];

    public function __construct(){
        $req = $_SERVER["REQUEST_URI"];
        //Localitzem el directori de muntatge per obtenir la ruta
        $reqSplit = explode('/phpapi', $req);
        //Treballem només amb la ruta
        $req = (isset($reqSplit[1])) ? $reqSplit[1] : "/";
        if($req != '/') {
			$req = '/' . $req;
		}

        //Carreguem vista
        if(isset($this->routes[$req])) {
            include 'public/' . $this->routes[$req][1];
        } else {
            include 'public/404.php';
        }
	}
}