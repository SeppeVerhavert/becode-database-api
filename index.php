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

$_GET['title'];

echo $_GET['title'];

?>