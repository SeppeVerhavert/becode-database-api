<?php
include 'header.php';

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
    } else {
        $feedback['querryError'] = "No records matching your query were found.";
    }
} catch (PDOException $e) {
    $feedback['sqlError'] = $e->getMessage();
}

include 'feedback.php';
