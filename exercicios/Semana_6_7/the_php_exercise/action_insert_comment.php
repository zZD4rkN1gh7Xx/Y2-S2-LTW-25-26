<?php
  session_start();
  if (!isset($_SESSION['username']))
    header('Location: index.php');

  require_once('database/connection.php');
  require_once('database/comments.php');

  $db = getDatabaseConnection();

  $news_id = $_POST['news_id'];
  $text = $_POST['comment'];
  $username = $_SESSION['username'];

  insertComment($db, $news_id, $username, $text);

  header('Location: article.php?id=' . $news_id);
?>