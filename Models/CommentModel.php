<?php
class CommentModel {
    // Database connection
    private $pdo;

    public function __construct() {
        $this->pdo = connDb::getInstance()->getPdo();
    }

    public function insertComment($username, $comment, $postId) {
        $query = "INSERT INTO comments (username, comment, post_id, created_at) VALUES (:username, :comment, :postId, NOW())";
        $stmt = $this->pdo->prepare($query);
        $result = $stmt->execute(['username' => $username, 'comment' => $comment, 'postId' => $postId]);
    }

    public function getCommentsByPostId($postId) {
        $query = "SELECT * FROM comments WHERE post_id = :postId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteComment($commentId) {
        $query = "DELETE FROM comments WHERE id = :commentId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':commentId', $commentId, PDO::PARAM_INT);
        $stmt->execute();
    }
}