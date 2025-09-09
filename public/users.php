<?php
    http_response_code(200); // o header('HTTP/1.1 200 OK');
    header('Content-Type: application/json');
    $params = ROUTING::params();
    $id = (isset($params['id'])) ? $params['id'] : -1;
    $data = USERS::readUser($id);
    $value = [];
    while ($row = $data->fetch_assoc()) {
        $value[] = $row;
    };
    echo json_encode($value);
?>