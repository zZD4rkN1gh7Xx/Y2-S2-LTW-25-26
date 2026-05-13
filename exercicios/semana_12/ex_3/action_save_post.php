<?php

$db = new PDO('sqlite:database.db');

if (preg_match('/[<>"\'&]/', $_POST['username'])) {
    die("Error: special characters not allowed in username");
}

if (preg_match('/[<>"\'&]/', $_POST['text'])) {
    die("Error: special characters not allowed in post");
}

$stmt = $db->prepare('INSERT INTO posts VALUES(NULL, ?, ?)');
$stmt->execute(array($_POST['username'], $_POST['text']));

header('Location: /');
