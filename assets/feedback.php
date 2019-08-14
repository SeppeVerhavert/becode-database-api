<?php
if (count($feedback) > 0) {
    echo json_encode($feedback);
}

unset($result);
unset($sql);
unset($pdo);
?>