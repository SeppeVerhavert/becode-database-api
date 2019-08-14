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
$title_input = $_GET['title'];
$note_input = $_POST['note'];
?>