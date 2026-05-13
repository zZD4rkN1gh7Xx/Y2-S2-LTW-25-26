<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <title>Change Email</title>
</head>

<body>
    <p>Current email: <?= htmlentities($_SESSION['email']) ?></p>
    <form action="action_change_email.php" method="post">
        <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
        New email: <input name="email" type="email" required><br>
        <button type="submit">Change</button>
    </form>
    <p><a href="index.php">Back</a></p>
</body>

</html>