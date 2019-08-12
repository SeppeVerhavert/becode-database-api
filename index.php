<?php
include "keys.php";

//  Create connection
$conn = new mysqli($servername, $username, $password);
//  Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "connection succesfull";
}

//  CREATE SUPERGLOBALS
$title_input = $_GET['title'];
$note_input = $_POST['note'];

echo "<br><br> title_input= ".$title_input;
echo "<br> note_input= ".$note_input;

// PREPARE
$stmt = $conn->prepare("INSERT INTO note_db.note_tb (title, note) VALUES (?, ?)");
$stmt->bind_param("ss", $title, $note);

//  SANITIIZE
$clean_title = filter_var($title_input, FILTER_SANITIZE_STRING);
$clean_note = filter_var($note_input, FILTER_SANITIZE_STRING);

//  VALIDATE
echo "<br> clean_title= ".$clean_title;

if (empty($clean_title)) {
    echo "please fill in a title.";
} else {
    $validate_title = filter_var($clean_title, FILTER_VALIDATE_REGEXP);
    if (filter_var($clean_title, FILTER_VALIDATE_REGEXP)) {
        echo "please enter a title with a valid syntax.";
    } else {
        echo "title is validated";
    }
}

// if (empty($clean_note)) {
//     echo "please fill in a note.";
// } else if (!filter_var($clean_note, FILTER_VALIDATE_REGEXP)) {
//     echo "please enter a note with a valid syntax";
// } else {
//     echo "note is validated.";
// }

// //  EXECUTE
// if ($conn->query($stmt) === TRUE) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $stmt . "<br>" . $conn->error;
// }
