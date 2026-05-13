<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css"><title>Dashboard</title></head>
<body>
    <p>Welcome, <?= htmlentities($_SESSION['username']) ?>!</p>
    <p>Your email: <?= htmlentities($_SESSION['email']) ?></p>
    <p><a href="change_email.php">Change Email</a></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
