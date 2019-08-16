<?php
//  SANITIZE
include './assets/header.php';

try {
    // PREPARE
    $stmt = $pdo->prepare("INSERT INTO $tbname (title, note) VALUES (:title, :note)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':note', $note);

    //  VALIDATE
    if (empty($title_input)) {
        $feedback['validate_titleError'] = "please fill in a title.";
    } else if (strlen($title_input) > 30) {
        $feedback['validate_titleError'] = "Title can't be longer than 30 characters.";
    } else {
        $validated_title = $title_input;
    }

    //  EXECUTE
    if (empty($note_input)) {
        $feedback['validate_noteError'] = "Your note is empty.";
    } else {
        $validated_note = $note_input;
    }
    if (count($feedback) <= 0) {
        $title = $validated_title;
        $note = $validated_note;
        $stmt->execute();
        $feedback['succes'] = "New records created successfully.";
    }
} catch (PDOException $e) {
    $feedback['stmtError'] = $e->getMessage();
}

//  FEEDBACK
include './assets/feedback.php';