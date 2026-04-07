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
    <!-- just for the hamburguer menu in responsive layout -->
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
  <aside id="related">
    <?php
    $db = new PDO('sqlite:news.db');

    $stmt = $db->prepare('
      SELECT news.*, users.*, COUNT(comments.id) AS comments
      FROM news JOIN
           users USING (username) LEFT JOIN
           comments ON comments.news_id = news.id
      GROUP BY news.id, users.username
      ORDER BY published DESC
    ');
    $stmt->execute();
    $articles = $stmt->fetchAll();

    foreach ($articles as $article) {
      echo '<article>';
      echo '<h1><a href="article.php?id=' . $article['id'] . '">' . htmlspecialchars($article['title']) . '</a></h1>';
      echo '<p>' . htmlspecialchars($article['introduction']) . '</p>';
      echo '</article>';
    }
    ?>
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