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
        <!-- just for the hamburger menu in responsive layout -->
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
    $db = new PDO('sqlite:news.db');

    $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = ?');
    $stmt->execute(array($_GET['id']));
    $article = $stmt->fetch();

    $stmt = $db->prepare('SELECT * FROM comments LEFT JOIN users USING (username) WHERE news_id = ?');
    $stmt->execute(array($_GET['id']));
    $comments = $stmt->fetchAll();

    $stmt2 = $db->prepare('
    SELECT news.*, COUNT(comments.id) AS comments
    FROM news LEFT JOIN comments ON comments.news_id = news.id
    GROUP BY news.id
    ORDER BY published DESC
  ');
    $stmt2->execute();
    $allArticles = $stmt2->fetchAll();
    ?>

    <aside id="related">
        <?php foreach ($allArticles as $related): ?>
            <article>
                <h1><a href="article.php?id=<?php echo $related['id']; ?>"><?php echo htmlspecialchars($related['title']); ?></a></h1>
                <p><?php echo htmlspecialchars($related['introduction']); ?></p>
            </article>
        <?php endforeach; ?>
    </aside>

    <section id="news">
        <?php if ($article):
            $date = date('F j', $article['published']);
            $tags = explode(',', $article['tags']);
        ?>
            <article>
                <header>
                    <h1><a href="article.php?id=<?php echo $article['id']; ?>"><?php echo htmlspecialchars($article['title']); ?></a></h1>
                </header>

                <img src="<?php echo !empty($article['image']) ? htmlspecialchars($article['image']) : 'https://picsum.photos/600/300?random=' . $article['id']; ?>" alt="">

                <p><?php echo htmlspecialchars($article['introduction']); ?></p>
                <p><?php echo htmlspecialchars($article['body']); ?></p>

                <section id="comments">
                    <h1><?php echo count($comments); ?> Comments</h1>

                    <?php foreach ($comments as $comment): ?>
                        <article class="comment">
                            <span class="user"><?php echo htmlspecialchars($comment['username']); ?></span>
                            <span class="date"><?php echo date('F j, Y', $comment['published']); ?></span>
                            <p><?php echo htmlspecialchars($comment['text']); ?></p>
                        </article>
                    <?php endforeach; ?>

                    <form action="#" method="post">
                        <h2>Add your voice...</h2>
                        <label>Username
                            <input type="text" name="username">
                        </label>
                        <label>E-mail
                            <input type="email" name="email">
                        </label>
                        <label>Comment
                            <textarea name="comment"></textarea>
                        </label>
                        <button type="submit">Reply</button>
                    </form>
                </section>

                <footer>
                    <span class="author"><?php echo htmlspecialchars($article['name']); ?></span>
                    <span class="tags">
                        <?php foreach ($tags as $tag): ?>
                            <a href="index.php">#<?php echo htmlspecialchars(trim($tag)); ?></a>
                        <?php endforeach; ?>
                    </span>
                    <span class="date"><?php echo $date; ?></span>
                    <a class="comments" href="#comments"><?php echo count($comments); ?></a>
                </footer>
            </article>

        <?php else: ?>
            <p>Article not found.</p>
        <?php endif; ?>
    </section>

    <footer>
        <p>&copy; Fake News, 2022</p>
    </footer>
</body>

</html>