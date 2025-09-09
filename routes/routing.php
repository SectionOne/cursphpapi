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

        //Evaluem la ruta obtinguda
        var_dump($req);
	}
}