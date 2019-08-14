<?php
include 'header.php';

// ATTEMPT SELECT QUERRY EXECUTION
try {
    // SELECT ALL
    $sql = "SELECT * FROM $tbname";
    $result = $pdo->query($sql);
    $array_result = [];
    $i = 0;

    // SHOW RESULT
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            $array_result["title".$i] = $row['title'];
            $i++;
        }
        print json_encode($array_result); 
        unset($result);
    } else {
        $feedback['querryError'] = "No records matching your query were found.";
    }
} catch (PDOException $e) {
    $feedback['sqlError'] = $e->getMessage();
}

include 'feedback.php';

