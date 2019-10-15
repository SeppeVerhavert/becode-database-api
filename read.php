<?php
include './assets/header.php';

//  VALIDATE
if (empty($title_input)) {
    $feedback['validate_titleError'] = "please fill in a title.";
} else {
    // ATTEMPT SELECT QUERRY EXECUTION
    try {
        // SELECT NOTE
        $sql = "SELECT * FROM $tbname WHERE title = '$title_input'";
        $result = $pdo->query($sql);
        $array_result = [];

        // SHOW RESULT
        if ($result->rowCount() > 0) {
            while ($row = $result->fetch()) {
                $array_result["title"] = $row['title'];
                $array_result["last_update"] = $row['last_update'];
                $array_result["note"] = $row['note'];

                print   '<div class="bigNote" style="background-color:'.$new_color.'">
                            <div class="title">'.$array_result["title"].'</div>
                            <div class="note">'.$array_result["note"].'</div>
                            <div class="last_update">'.$array_result["last_update"].'</div>
                        </div>';
                // print json_encode($array_result);
            }
        } else {
            $feedback['querryError'] = "No record matching your query could be found.";
        }
    } catch (PDOException $e) {
        $feedback['sqlError'] = $e->getMessage();
    }
}

include './assets/feedback.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notes Database</title>
    <link rel = "stylesheet" type = "text/css" href = "./assets/css/style.css" />
</head>
<body>
    <div class="container">
        <div class="buttonrow">
            <button class="buttonrowbutton">CREATE</button>
            <button class="buttonrowbutton">READ</button>
            <button class="buttonrowbutton">UPDATE</button>
            <button class="buttonrowbutton">DELETE</button>
        </div>
        <?php  ?>
    </div>
</body>
</html>