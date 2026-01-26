<?php 

switch($method){

    $id = $_SESSION['ID']

    case "GET": 

        $firstname = $_GET['firstname'];
        $lastname  = $_GET['lastname'];
        $email = $_GET['email'];
        $phone = $_GET['phone'];

        $stmt = $conn->prepare(
        "SELECT *FROM users
            WHERE ownder_id = ? 
            AND first_name LIKE CONCAT(?, '%')
            AND last_name  LIKE CONCAT(?, '%')
            AND email  LIKE CONCAT(?, '%')
            AND phone  LIKE CONCAT(?, '%')"
        );
        
        $stmt->bind_param("issss", $id, $firstname, $lastname, $email, $phone);

        if(!$stmt->execute()) { 
            http_response_code(500);
            echo json_encode(["error" => "problem fetching user data from the database", "db-err-msg" => $stmt->error]);
            die();
        }

        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($data);

        stmt->close();
        break;

    case "POST":

        $firstname = $_POST['firstname'];
        $lastname  = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        
        $stmt = $mysqli->prepare("INSERT INTO users (user_id, first_name, last_name, email, phone) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss",$id,$firstname,$lastname,$email,$phone);
        if(!$stmt->execute()) { 
            http_response_code(500);
            echo json_encode(["error" => "problem inserting data into the database", "db-err-msg" => $stmt->error]);
            die();
        }

        stmt->close();
        break;
        




}