<?php
include './assets/header.php';

//  PARAMETERS
$newtitle_input = $_GET['newtitle'];
$newnote_input = $_POST['newnote'];

//  IF EMPTY
if (empty($newtitle_input)) {
    $newtitle_input = $title_input;
}

if (empty($newnote_input)) {
    $sql = "SELECT * FROM $tbname WHERE title = '$title_input'";
    $result = $pdo->query($sql);
    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            $newnote_input = $row['note'];
        }
    }
}

//  VALIDATE
if (empty($title_input)) {
    $feedback['validate_titleError'] = "please fill in a title.";
} else {
    // ATTEMPT QUERRY EXECUTION
    try {
        // UPDATE
        $sql = "UPDATE $tbname
                SET title = '$newtitle_input',
                    note = '$newnote_input'
                WHERE title = '$title_input'";
        $result = $pdo->query($sql);
        $feedback['succes'] = "Record updated successfully.";
    } catch (PDOException $e) {
        $feedback['sqlError'] = $e->getMessage();
    }
}

include './assets/feedback.php';