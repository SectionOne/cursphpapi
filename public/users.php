<?php
    http_response_code(200); // o header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    $data = USERS::readUser();
    $value = $data->fetch_assoc();
    echo json_encode($value);
?>