<?php
// header('Content-Type: application/json');
include 'keys.php';
$feedback = [];

//  CONNECT TO DATABASE
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $feedback['pdoError'] = $e->getMessage();
}

//  CREATE SUPERGLOBALS
$unsanitized_title = $_GET['title'];
$unsanitized_note = $_POST['note'];

//  SANTIZE
$title_input = filter_var($unsanitized_title, FILTER_SANITIZE_STRING);
$note_input = filter_var($unsanitized_note, FILTER_SANITIZE_STRING);
?>