<?php
function getAllNews($db) {
    $stmt = $db->prepare('
        SELECT news.*, users.*, COUNT(comments.id) AS comments
        FROM news JOIN
             users USING (username) LEFT JOIN
             comments ON comments.news_id = news.id
        GROUP BY news.id, users.username
        ORDER BY published DESC
    ');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getNewsById($db, $id) {
    $stmt = $db->prepare('SELECT * FROM news JOIN users USING (username) WHERE id = ?');
    $stmt->execute(array($id));
    return $stmt->fetch();
}

function updateNews($db, $id, $title, $introduction, $body) {
    $stmt = $db->prepare('UPDATE news SET title = ?, introduction = ?, fulltext = ? WHERE id = ?');
    $stmt->execute(array($title, $introduction, $body, $id));
}

function insertNews($db, $title, $introduction, $fulltext, $username) {
    $stmt = $db->prepare('INSERT INTO news VALUES (NULL, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($title, time(), '', $username, $introduction, $fulltext));
}

function deleteNews($db, $id) {
    // delete comments -- avoid foreign key things
    $stmt = $db->prepare('DELETE FROM comments WHERE news_id = ?');
    $stmt->execute(array($id));

    // delete article
    $stmt = $db->prepare('DELETE FROM news WHERE id = ?');
    $stmt->execute(array($id));
}
?>