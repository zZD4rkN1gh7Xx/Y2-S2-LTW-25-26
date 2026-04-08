<?php
function getCommentsByNewsId($db, $id) {
    $stmt = $db->prepare('SELECT * FROM comments LEFT JOIN users USING (username) WHERE news_id = ?');
    $stmt->execute(array($id));
    return $stmt->fetchAll();
}