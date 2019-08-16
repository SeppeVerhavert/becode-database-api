<?php
include 'list.php';

function make_notes() {
    $x = 0;
    global $array_result;
    while ($x < count($array_result)) {
        $new_color = random_color();
        print '<div class="smallNote" style="background-color:'.$new_color.'"><a href="http://localhost/becode-database-api/read.php?title='.$array_result[$x].'">'.$array_result[$x].'</div>';
        $x++;
    }    
}

function random_color() {
    $new_color = [];
    $i = 0;
    while ($i < 3) {
        $new_color[$i] = str_pad( dechex( mt_rand( 150, 250 ) ), 2, '0', STR_PAD_LEFT);
        $i++;
    }
    return "#" . $new_color[0] . $new_color[1] . $new_color[2];
}


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
        <?php make_notes(); ?>
    </div>
</body>
</html>