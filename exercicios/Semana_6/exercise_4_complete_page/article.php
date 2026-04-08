<?php
    require_once('database/connection.php');
    require_once('database/news.php');
    require_once('database/comments.php');
    require_once('templates/common.php');
    require_once('templates/news.php');
    require_once('templates/comments.php');

    $db = getDatabaseConnection();
    $article = getNewsById($db, $_GET['id']);
    $comments = getCommentsByNewsId($db, $_GET['id']);
    $allArticles = getAllNews($db);

    output_header();
    output_aside($allArticles);
    if ($article) {
        output_full_article($article, $comments);
    } 
    else { ?>
        <p>Article not found.</p>
    <?php }
    output_footer();
?>