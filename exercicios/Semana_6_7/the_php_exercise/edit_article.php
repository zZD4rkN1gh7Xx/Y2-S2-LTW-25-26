<?php
    session_start();
    if (!isset($_SESSION['username']))
        header('Location: index.php');

    require_once('database/connection.php');
    require_once('database/news.php');
    require_once('templates/common.php');

    $db = getDatabaseConnection();
    $article = getNewsById($db, $_GET['id']);

    output_header();
?>

<section id="news">
  <form action="action_edit_news.php" method="post">
    <input type="hidden" name="id" value="<?php echo $article['id']; ?>">
    
    <label>Title
      <input type="text" name="title" value="<?php echo htmlspecialchars($article['title']); ?>">
    </label>
    <label>Introduction
      <textarea name="introduction"><?php echo htmlspecialchars($article['introduction']); ?></textarea>
    </label>
    <label>Full Text
      <textarea name="fulltext"><?php echo htmlspecialchars($article['body']); ?></textarea>
    </label>
    <button type="submit">Save</button>
  </form>
</section>

<?php output_footer(); ?>