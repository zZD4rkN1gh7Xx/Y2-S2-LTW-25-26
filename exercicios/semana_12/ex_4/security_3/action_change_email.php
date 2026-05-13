<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Invalid CSRF token.");
}

$db = new PDO('sqlite:database.sqlite');
$stmt = $db->prepare('UPDATE users SET email = ? WHERE username = ?');
$stmt->execute([$_POST['email'], $_SESSION['username']]);
$_SESSION['email'] = $_POST['email'];
echo "Email changed successfully. <a href='index.php'>Back</a>";
