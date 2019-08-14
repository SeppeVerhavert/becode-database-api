<?php
include 'header.php';

//  PARAMETERS
$newtitle_input = $_GET['newtitle'];
$newnote_input = $_POST['newnote'];

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
        $feedback['succes'] = "Records updated successfully.";
    } catch (PDOException $e) {
        $feedback['sqlError'] = $e->getMessage();
    }
}

include 'feedback.php';
