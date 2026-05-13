<?php
session_start();

$db = new PDO('sqlite:database.db');

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$hash = password_hash($password, PASSWORD_BCRYPT); // should be in the resgister file

$stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$username]);

$user = $stmt->fetch();

if ($user && password_verify($password, $user['password'])) {
  $_SESSION['username'] = $user['username'];
}

header('Location: /');
