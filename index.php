<?php
include "keys.php";
$errors = [];

//  Create connection
$conn = new mysqli($servername, $username, $password);
//  Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    $errors['connection'] = "Connection failed";
}

//  CREATE SUPERGLOBALS
$title_input = $_GET['title'];
$note_input = $_POST['note'];

try {

    // PREPARE
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $conn->prepare("INSERT INTO $tbname (title, note)
    VALUES (:title, :note)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':note', $note);

    //  SANITIIZE
    $clean_title = filter_var($title_input, FILTER_SANITIZE_STRING);
    $clean_note = filter_var($note_input, FILTER_SANITIZE_STRING);

    //  VALIDATE
    if (empty($clean_title)) {
        $errors['validate_title'] = "please fill in a title.";
    } else {
        $validated_title = $clean_title;
    }

    if (empty($clean_note)) {
        $errors['validate_note'] = "Your note is empty.";
    } else {
        $validated_note = $clean_note;
    }

    //  EXECUTE
    $title = $validated_title;
    $note = $validated_note;
    $stmt->execute();

    echo "New records created successfully";
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
    
$conn = null;
