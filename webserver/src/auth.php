<?php

switch($segments[1]){

    case "signup":

        if($method!="POST"){
            http_response_code(400);
            json_encode(["error" => "invalid request method"]);
            die();
        }

        $username = $_POST['username'];
        $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, password_hash) VALUES (?, ?)")
        $stmt->bind_param("ss", $username, $password_hash);

        if(!$stmt->execute()) { 
            http_response_code(500);
            echo json_encode(["error" => "problem adding user data to database", "db-err-msg" => $stmt->error]);
            die();
        }

        $stmt->close();
        break;

    case "login":

        if($method!="POST"){
            http_response_code(400);
            json_encode(["error" => "invalid request method"]);
            die();
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $stmt= $conn->prepare("SELECT * FROM users WHERE username = ?")
        $stmt->bind_param("s", $username);

        if(!$stmt->execute()) { 
            http_response_code(500);
            echo json_encode(["error" => "problem fetching user data from the database", "db-err-msg" => $stmt->error]);
            die();
        }

        $result = $stmt->get_result();
        if($result->num_rows == 0){
            http_response_code(401);
            echo json_encode(["error" => "problem fetching user data from the database", "db-err-msg" => $stmt->error]);
            die();
        }
        if($result->num_rows != 1){
            http_response_code(500);
            echo json_encode(["error" => "this user's info is duplicated in the database. Please remove the duplicates"]);
            die();
        }
        while($row = result->fetch_assoc()){
            if(password_verify($password,$row['password_hash'])){        
                $_SESSION['ID'] = $row['id']; 
            }else{
                http_response_code(401);
                echo json_encode(["error" => "Incorrect login information"]);
                die();
            }
        }

        $stmt->close();
        break;

    case "logout":
        session_destroy();
        break;

    default:
        http_response_code(400);
        echo json_encode(["error" => "invalid request uri, or server request uri parsing error"]);
        die();
}        