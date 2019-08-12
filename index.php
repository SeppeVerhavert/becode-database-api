<?php
include "keys.php";
$feedback = [];

//  Create connection
$conn = new mysqli($servername, $username, $password);
//  Check connection
if ($conn->connect_error) {
    $feedback['connectionError'] = "Connection failed";
}

include 'addnote.php';
include 'listnotes.php';


//  FEEDBACK
if (count($feedback) > 0) {
    echo json_encode($feedback);
}

unset($conn);
