<?php
header('Content-Type: application/json');
include 'keys.php';

//  CONNECT TO DATABASE
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    $feedback['pdoError'] = $e->getMessage();
}

// ATTEMPT SELECT QUERRY EXECUTION
try {
    $sql = "SELECT * FROM $tbname";
    $result = $pdo->query($sql);
    $array_result = [];
    $i = 0;

    if ($result->rowCount() > 0) {
        while ($row = $result->fetch()) {
            $array_result["title".$i] = $row['title'];
            $i++;
        }
        print json_encode($array_result, JSON_PRETTY_PRINT); 
        unset($result);
    } else {
        $feedback['querryError'] = "No records matching your query were found.";
    }
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);
