<?php
include './assets/header.php';

//  VALIDATE
if (empty($title_input)) {
    $feedback['validate_titleError'] = "please fill in a title.";
} else {
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
            $feedback['querryError'] = "No record matching your query could be found.";
        }
    } catch (PDOException $e) {
        $feedback['sqlError'] = $e->getMessage();
    }
}

include './assets/feedback.php';
