<?php
  session_start();
  if (!isset($_SESSION['username']))
    header('Location: index.php');

  require_once('database/connection.php');
  require_once('database/news.php');

  $db = getDatabaseConnection();

  $title = $_POST['title'];
  $introduction = $_POST['introduction'];
  $fulltext = $_POST['fulltext'];
  $username = $_SESSION['username'];

  insertNews($db, $title, $introduction, $fulltext, $username);

  header('Location: index.php');
?>