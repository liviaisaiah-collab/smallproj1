<?php

session_start();  

header('Content-Type: application/json; charset=utf-8');

require('../src/db.php');

$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER["REQUEST_METHOD"];
$segments = explode("/", trim($uri,"/"));

switch($segments[0]){
    case 'auth':
        require('../src/auth.php');
        break;
    case 'contacts':
        if (isset($_SESSION['user_id'])) {
            require('../src/contacts.php');
            break;
        }else{
            http_response_code(403);
            echo json_encode(["error" => "You are not authorized to make this request. You are not logged in"]);
            die();
        }
    default:
        http_response_code(400);
        echo json_encode(["error" => "invalid request uri, or server request uri parsing error"]);
        die();
}
