<!DOCTYPE html>
<html lang="en-US">

<head>
  <title>Super Legit News</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="style.css" rel="stylesheet">
  <link href="layout.css" rel="stylesheet">
  <link href="responsive.css" rel="stylesheet">
  <link href="comments.css" rel="stylesheet">
  <link href="forms.css" rel="stylesheet">
</head>

<body>
  <header>
    <h1><a href="index.php">Super Legit News</a></h1>
    <h2><a href="index.php">Where fake news are born!</a></h2>
    <div id="signup">
      <a href="register.html">Register</a>
      <a href="login.html">Login</a>
    </div>
  </header>
  <nav id="menu">
    <input type="checkbox" id="hamburger">
    <label class="hamburger" for="hamburger"></label>

    <ul>
      <li><a href="index.php">Local</a></li>
      <li><a href="index.php">World</a></li>
      <li><a href="index.php">Politics</a></li>
      <li><a href="index.php">Sports</a></li>
      <li><a href="index.php">Science</a></li>
      <li><a href="index.php">Weather</a></li>
    </ul>
  </nav>

  <?php
  require_once('database/connection.php');
  require_once('database/news.php');

  $db = getDatabaseConnection();
  $articles = getAllNews($db);
  ?>
  <aside id="related">
    <?php foreach ($articles as $related): ?>
      <article>
        <h1><a href="article.php?id=<?php echo $related['id']; ?>"><?php echo htmlspecialchars($related['title']); ?></a></h1>
        <p><?php echo htmlspecialchars($related['introduction']); ?></p>
      </article>
    <?php endforeach; ?>
  </aside>

  <section id="news">
    <?php foreach ($articles as $article):
      $date = date('F j', $article['published']);
      $tags = explode(',', $article['tags']);
    ?>
      <article>
        <header>
          <h1><a href="article.php?id=<?php echo $article['id']; ?>"><?php echo htmlspecialchars($article['title']); ?></a></h1>
        </header>
        <img src="<?php echo !empty($article['image']) ? htmlspecialchars($article['image']) : 'https://picsum.photos/600/300?random=' . $article['id']; ?>" alt="">
        <p><?php echo htmlspecialchars($article['introduction']); ?></p>
        <footer>
          <span class="author"><?php echo htmlspecialchars($article['name']); ?></span>
          <span class="tags">
            <?php foreach ($tags as $tag): ?>
              <a href="index.php">#<?php echo htmlspecialchars(trim($tag)); ?></a>
            <?php endforeach; ?>
          </span>
          <span class="date"><?php echo $date; ?></span>
          <a class="comments" href="article.php?id=<?php echo $article['id']; ?>#comments"><?php echo $article['comments']; ?></a>
        </footer>
      </article>
    <?php endforeach; ?>
  </section>
  <footer>
    <p>&copy; Fake News, 2022</p>
  </footer>
</body>

</html>