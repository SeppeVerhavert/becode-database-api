<?php
include "keys.php";

// Create connection
$conn = new mysqli($servername, $username, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "connection succesfull";
}

// Create database
$sql = require "noteDB.sql";
if ($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

$conn->close();
?>
<!-- 
$_GET['title'];
$_GET['note'];

echo $_GET['title'];
echo $_GET['note'];

?> -->