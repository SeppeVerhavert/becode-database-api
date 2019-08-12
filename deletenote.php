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

// QUERY EXECUTION
try {
    //  DELETE
    $sql = "DELETE * FROM $tbname WHERE title='$title_input'";
    if($sql) {
        $result = $pdo->query($sql);
        $feedback['succes'] = "Your note was succesfully deleted";
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
