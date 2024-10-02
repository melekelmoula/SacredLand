<?php

class AdminModel {

    private $username;
    private $password;
    private $pdo; // Add property to store PDO object

    public function __construct($username, $password,$pdo) {
        
        $this->username = $username;
        $this->password = $password;
        $this->pdo=$pdo;
    }

    public function getUsername() {
        return $this->username;
    }
    
    public function createUser($username, $password,$email) {
        $role="user";
        $sql = "INSERT INTO users (username, password, role,email) VALUES (:username, :password ,:role,:email)";
        $stmt = $this->pdo->prepare($sql);
        $result = $stmt->execute(['username' => $username, 'password' => $password , 'role' => $role, 'email' => $email]);
    }

    public function deleteUser($userId) {
        $query = "DELETE FROM users WHERE id = :userId";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function searchUsernameexist($username) {
        $sql = "SELECT username FROM users WHERE username = :username ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return true; // Return the user details
        } else {
            return false; // Return null if user not found
        }
    }

    public function searchEmailexist($email) {
        $sql = "SELECT email FROM users WHERE email = :email ";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            return true; // Return the user details
        } else {
            return false; // Return null if user not found
        }
    }

    public function searchUser($username, $password) {
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['username' => $username, 'password' => $password]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($user && $user['role'] == 'user') {
            return 1; // Return true if user role is 'user'
        } else if ($user && $user['role'] == 'admin') {
            return 2; // Return false if user role is 'admin'
        } else {
            return 3; // Return null if user not found
        }
    }
    
}
?>