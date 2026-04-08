<?php function output_comments($comments)
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
<?php } ?>