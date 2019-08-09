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

    $sql = "INSERT INTO note_db.note_tb (title, note)
    VALUES ('$title', '$note')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
