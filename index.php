<?php
include "keys.php";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "connection succesfull";

    $title = $_GET['title'];
    $note = $_POST['note'];

    echo $title;
    echo $note;

    // PREPARE


    //  SANITIIZE
    $clean_title = filter_var($title, FILTER_SANITIZE_STRING);
    $clean_note = filter_var($note, FILTER_SANITIZE_STRING);
    
    //  VALIDATE

    $sql = "INSERT INTO note_db.note_tb (title, note)
    VALUES ('$title', '$note')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
