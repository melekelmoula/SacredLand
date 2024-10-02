<?php
require_once('connDb.php');

class PostModel {
    // Database connection
    private $pdo;
    public function __construct() {
        $this->pdo = connDb::getInstance()->getPdo();
    }

    public function getAllPosts($pdo) {
        $query = "SELECT * FROM posts";
        $stmt = $this->pdo->prepare($query); // Changed $pdo to $this->pdo
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function insertPost($title, $content, $username, $pdo,$photo) {
        $query = "INSERT INTO posts (title, content, username, created_at , photo) VALUES (:title, :content, :username, NOW(),:photo)";
        $stmt = $pdo->prepare($query); // Changed $pdo to $this->pdo
        $result = $stmt->execute(['title' => $title, 'content' => $content, 'username' => $username , 'photo' => $photo]);
    }

    public function getPostById($postId) {
        $query = "SELECT * FROM posts WHERE id = :postId";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function getCommentsByPostId($postId) {
        $query = "SELECT * FROM comments WHERE post_id = :postId";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':postId', $postId, PDO::PARAM_INT);
        $statement->execute();
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insertComment($postId, $username, $comment) {
        $query = "INSERT INTO comments (post_id, username, comment, created_at) VALUES (:postId, :username, :comment, NOW())";
        $statement = $this->pdo->prepare($query);
        $statement->execute(['postId' => $postId, 'username' => $username, 'comment' => $comment]);
    }

    public function deletePost($postId) {
        $query = "DELETE FROM posts WHERE id = :postId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':postId', $postId, PDO::PARAM_INT);
        $stmt->execute();
    }
}
