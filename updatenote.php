<?php
include 'header.php';

//  PARAMETERS
$newtitle_input = $_GET['newtitle'];
$newnote_input = $_POST['newnote'];

var_dump($title_input);
var_dump($newtitle_input);

//  VALIDATE
if (empty($title_input)) {
    $feedback['validate_titleError'] = "please fill in a title.";
} else {
    // ATTEMPT SELECT QUERRY EXECUTION
    try {
        // SELECT ALL
        $sql = "UPDATE $tbname
                SET title = '$newtitle_input'
                WHERE title = '$title_input'";
        $result = $pdo->query($sql);
    } catch (PDOException $e) {
        $feedback['sqlError'] = $e->getMessage();
    }
}

include 'feedback.php';
