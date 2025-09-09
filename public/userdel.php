<?php
    header('Content-Type: application/json');
    $code = 0;
    $value = "";
    $params = ROUTING::params();
    $id = (isset($params['id'])) ? $params['id'] : NULL;

    if(isset($id)){
        //Procedim a crear l'usuari
        if(USERS::deleteUser($id)){
            $code = 200;
            $value = "Usuari eliminat correctament.";
        } else {
            $code = 500;
            $value = "Error: No s'ha pogut eliminar l'usuari.";
        }
    } else {
        //Codi per error de falta de dades
        $code = 400;
        $value = "Error: No s'ha pogut eliminar l'usuari, per falta de dades.";
    }
    
    http_response_code($code);
    
    echo json_encode($value);
?>