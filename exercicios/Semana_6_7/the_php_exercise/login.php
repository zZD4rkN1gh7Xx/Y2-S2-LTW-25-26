<?php
  session_start();
  require_once('database/connection.php');
  require_once('database/news.php');
  require_once('templates/common.php');
  require_once('templates/news.php');  // ← missing

  $db = getDatabaseConnection();
  $articles = getAllNews($db);

  output_header();
  output_aside($articles);
?>

<section id="news">
  <form action="action_login.php" method="post">
    <label>Username
      <input type="text" name="username">
    </label>
    <label>Password
      <input type="password" name="password">
    </label>
    <button type="submit">Login</button>
  </form>
</section>

<?php output_footer(); ?>