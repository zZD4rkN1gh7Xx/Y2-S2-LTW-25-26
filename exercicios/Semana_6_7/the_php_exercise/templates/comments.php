<?php function output_comments($comments, $news_id)
{ ?>
    <section id="comments">
        <h1><?php echo count($comments); ?> Comments</h1>
        <?php foreach ($comments as $comment): ?>
            <article class="comment">
                <span class="user"><?php echo htmlspecialchars($comment['username']); ?></span>
                <span class="date"><?php echo date('F j, Y', $comment['published']); ?></span>
                <p><?php echo htmlspecialchars($comment['text']); ?></p>
            </article>
        <?php endforeach; ?>
        
        <?php if (isset($_SESSION['username'])): ?>
            <form action="action_insert_comment.php" method="post">
                <input type="hidden" name="news_id" value="<?php echo $news_id; ?>">
                <h2>Add your voice...</h2>
                <label>Comment
                    <textarea name="comment"></textarea>
                </label>
                <button type="submit">Reply</button>
            </form>
        <?php endif; ?>
    </section>
<?php } ?>