<?php
    header('Content-Type: application/json');
    $code = 0;
    $value = "";
    $params = ROUTING::params();
    $nom = (isset($params['nom'])) ? $params['nom'] : NULL;
    $email = (isset($params['email'])) ? $params['email'] : NULL;
    $clau = (isset($params['clau'])) ? $params['clau'] : NULL;
    $status = 0;

    if(isset($nom) && isset($email) && isset($clau)){
        //Procedim a crear l'usuari
        $code = 200;
        $value = "Usuari creat correctament.";
    } else {
        //Codi per error de falta de dades
        $code = 400;
        $value = "Error: No s'ha pogut crear l'usuari, per falta de dades.";
    }
    
    http_response_code($code);
    
    echo json_encode($value);
?>