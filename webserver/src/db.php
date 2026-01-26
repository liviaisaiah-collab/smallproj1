<?php

$servername = "localhost";
$username = getenv("DB_USERNAME");
$password = getenv("DB_PASSWORD");
$dbname = getenv("DB_DATABASE");

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error){
    http_response_code(500);
    echo json_encode(['error' => 'database connection failed to establish on server']);
    die();
}