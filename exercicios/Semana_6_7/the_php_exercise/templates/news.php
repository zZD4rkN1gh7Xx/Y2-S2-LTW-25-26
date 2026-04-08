<?php function output_aside($articles)
{ ?>
    <aside id="related">
        <?php foreach ($articles as $related): ?>
            <article>
                <h1><a href="article.php?id=<?php echo $related['id']; ?>"><?php echo htmlspecialchars($related['title']); ?></a></h1>
                <p><?php echo htmlspecialchars($related['introduction']); ?></p>
            </article>
        <?php endforeach; ?>
    </aside>
<?php } ?>

<?php function output_article_list($articles)
{ ?>
    <section id="news">
        <?php foreach ($articles as $article) output_article($article); ?>
    </section>
<?php } ?>

<?php function output_article($article)
{
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
<?php } ?>

<?php function output_full_article($article, $comments)
{
    $date = date('F j', $article['published']);
    $tags = explode(',', $article['tags']);
?>
    <section id="news">
        <article>
            <header>
                <h1><?php echo htmlspecialchars($article['title']); ?></h1>
            </header>
            <img src="<?php echo !empty($article['image']) ? htmlspecialchars($article['image']) : 'https://picsum.photos/600/300?random=' . $article['id']; ?>" alt="">
            <p><?php echo htmlspecialchars($article['introduction']); ?></p>
            <p><?php echo htmlspecialchars($article['body']); ?></p>
            <?php output_comments($comments); ?>
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
    </section>
<?php } ?>