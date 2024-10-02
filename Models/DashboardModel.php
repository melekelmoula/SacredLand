<?php
require_once 'models/connDb.php';

class DashboardModel {
    // Database connection
    private $pdo;
    public function __construct() {
        $this->pdo = connDb::getInstance()->getPdo();
    }

    public function getAllusers($pdo) {
        $query = "SELECT * FROM users";
        $stmt = $this->pdo->prepare($query); // Changed $pdo to $this->pdo
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllposts($pdo) {
        $query = "SELECT * FROM posts";
        $stmt = $this->pdo->prepare($query); // Changed $pdo to $this->pdo
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllcomments($pdo) {
        $query = "SELECT * FROM comments";
        $stmt = $this->pdo->prepare($query); // Changed $pdo to $this->pdo
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}