<?php
  session_start();
  if (!isset($_SESSION['username']))
    header('Location: index.php');

  require_once('database/connection.php');
  require_once('database/news.php');

  $db = getDatabaseConnection();

  $id = $_POST['id'];

  deleteNews($db, $id);

  header('Location: index.php');
?>