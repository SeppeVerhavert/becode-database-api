<?php
include 'header.php';

//  GET PARAMETERS
$title_input = $_GET['title'];

// QUERY EXECUTION
try {
    //  DELETE
    $sql = "DELETE FROM $tbname WHERE title = '$title_input'";
    if ($sql) {
        $result = $pdo->query($sql);
        $feedback['succes'] = $title_input . " was succesfully deleted";
        unset($result);
    } else {
        $feedback['querryError'] = "No records matching your query were found.";
    }
} catch (PDOException $e) {
    $feedback['sqlError'] = $e->getMessage();
}

include 'feedback.php';

