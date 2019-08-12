<?php
include 'keys.php';

//  CONNECT TO DATABASE
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Attempt select query execution
try {
    $sql = "SELECT * FROM $tbname";
    $result = $pdo->query($sql);
    $array_result = [];
    $i = 0;

    if ($result->rowCount() > 0) {
        echo "<table>";
        while ($row = $result->fetch()) {
            $array_result[$i] = $row['title'];
            $i++;
        }
        echo json_encode($array_result);
        unset($result);
    } else {
        echo "No records matching your query were found.";
    }
} catch (PDOException $e) {
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
}

// Close connection
unset($pdo);
