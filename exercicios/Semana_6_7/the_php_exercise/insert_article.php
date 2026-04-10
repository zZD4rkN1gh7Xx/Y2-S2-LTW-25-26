<?php
  session_start();
  if (!isset($_SESSION['username']))
    header('Location: index.php');

  require_once('database/connection.php');
  require_once('database/news.php');
  require_once('templates/common.php');
  require_once('templates/news.php');

  $db = getDatabaseConnection();
  $articles = getAllNews($db);

  output_header();
  output_aside($articles);
  output_article_form();
  output_footer();
?>