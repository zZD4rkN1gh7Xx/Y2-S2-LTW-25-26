<?php
session_start();

if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    die("Invalid CSRF token.");
}

unset($_SESSION['csrf_token']);

$db = new PDO('sqlite:database.sqlite');
$stmt = $db->prepare('SELECT * FROM users WHERE username = ?');
$stmt->execute([$_POST['username']]);
$user = $stmt->fetch();

if ($user && password_verify($_POST['password'], $user['password'])) {
    $_SESSION['username'] = $user['username'];
    $_SESSION['email'] = $user['email'];
    header('Location: index.php');
} else {
    echo "Invalid login.";
}