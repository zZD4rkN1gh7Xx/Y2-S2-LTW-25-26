<?php
  session_start();

  require_once('database/connection.php');
  require_once('database/users.php');

  $db = getDatabaseConnection();

  if (userExists($db, $_POST['username'], $_POST['password']))
    $_SESSION['username'] = $_POST['username'];

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>