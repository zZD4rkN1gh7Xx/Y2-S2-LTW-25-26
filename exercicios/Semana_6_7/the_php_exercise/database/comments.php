<?php
function getCommentsByNewsId($db, $id) {
    $stmt = $db->prepare('SELECT * FROM comments LEFT JOIN users USING (username) WHERE news_id = ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}

function insertComment($db, $news_id, $username, $text) {
    $stmt = $db->prepare('INSERT INTO comments VALUES (NULL, ?, ?, ?, ?)');
    $stmt->execute(array($news_id, $username, time(), $text));
}