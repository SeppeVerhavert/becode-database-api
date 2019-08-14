<?php
include './assets/header.php';

try {
    // PREPARE
    $stmt = $pdo->prepare("INSERT INTO $tbname (title, note) VALUES (:title, :note)");
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':note', $note);


    //  SANITIIZE
    $clean_title = filter_var($title_input, FILTER_SANITIZE_STRING);
    $clean_note = filter_var($note_input, FILTER_SANITIZE_STRING);


    //  VALIDATE
    if (empty($clean_title)) {
        $feedback['validate_titleError'] = "please fill in a title.";
    } else if (strlen($clean_title) > 30) {
        $feedback['validate_titleError'] = "Title can't be longer than 30 characters.";
    } else {
        $validated_title = $clean_title;
    }


    //  EXECUTE
    if (empty($clean_note)) {
        $feedback['validate_noteError'] = "Your note is empty.";
    } else {
        $validated_note = $clean_note;
    }
    if (count($feedback) <= 0) {

        $title = $validated_title;
        $note = $validated_note;
        $stmt->execute();
        $feedback['succes'] = "New records created successfully.";

        unset($stmt);
    }
} catch (PDOException $e) {
    $feedback['stmtError'] = $e->getMessage();
}

//  FEEDBACK
include './assets/feedback.php';