<?php
    header('Content-Type: application/json');
    $code = 0;
    $value = "";
    $params = ROUTING::params();
    $id = (isset($params['id'])) ? $params['id'] : NULL;
    $nom = (isset($params['nom'])) ? $params['nom'] : NULL;
    $email = (isset($params['email'])) ? $params['email'] : NULL;
    $clau = (isset($params['clau'])) ? $params['clau'] : NULL;
    $status = 0;
    if(isset($id) && isset($nom) && isset($email) && isset($clau)){
        //Procedim a crear l'usuari
        if(USERS::updateUser($id,$nom,$email,$clau)){
            $code = 200;
            $value = "Usuari actualitzat correctament.";
        } else {
            $code = 500;
            $value = "Error: No s'ha pogut actualitzar l'usuari.";
        }
    } else {
        //Codi per error de falta de dades
        $code = 400;
        $value = "Error: No s'ha pogut actualitzar l'usuari, per falta de dades.";
    }
    
    http_response_code($code);
    
    echo json_encode($value);
?>