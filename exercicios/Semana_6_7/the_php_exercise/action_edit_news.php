<?php
   
  require_once('database/connection.php');
  require_once('database/news.php');

  $db = getDatabaseConnection();

  $id = $_POST['id'];
  $title = $_POST['title'];
  $introduction = $_POST['introduction'];
  $body = $_POST['fulltext'];

  updateNews($db, $id, $title, $introduction, $body);

  header('Location: article.php?id=' . $id);
?>