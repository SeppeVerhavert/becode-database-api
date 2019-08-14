<?php
header('Content-Type: application/json');
include 'keys.php';
$feedback = [];

//  CONNECT TO DATABASE
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $feedback['pdoError'] = $e->getMessage();
}

//  GET PARAMETERS
$title_input = $_GET['title'];

// ATTEMPT SELECT QUERRY EXECUTION
try {
    // SELECT ALL
    $sql = "SELECT * FROM $tbname WHERE title = '$title_input'";
    $result = $pdo->query($sql);
    $array_result = [];

    // SHOW RESULT
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            $array_result["title"] = $row['title'];
            $array_result["last_update"] = $row['last_update'];
            $array_result["note"] = $row['note'];
            print json_encode($array_result); 
        }
        unset($result);
    } else {
        $feedback['querryError'] = "No records matching your query were found.";
    }
} catch (PDOException $e) {
    $feedback['sqlError'] = $e->getMessage();
}

//  FEEDBACK
if (count($feedback) > 0) {
    echo json_encode($feedback);
}

unset($pdo);
