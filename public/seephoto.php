<?php
    $params = ROUTING::params();
    $id = (isset($params['id'])) ? $params['id'] : -1;
    $filepath = PHOTOS::seePhoto($id);
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        readfile($filepath);
        exit;
    } else {
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode("Imatge no trobada.");
    }
?>