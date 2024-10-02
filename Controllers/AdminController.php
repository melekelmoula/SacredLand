<?php

require_once 'models/connDb.php';
require_once 'models/AdminModel.php';

class AdminController {
    
    private $username;
    private $password;
    private $pdo; 

    public function __construct() {
        $this->pdo = connDb::getInstance()->getPdo();
    }

    public function getUsername() {
        return $this->username;
    }

    public function index() {

	require_once 'Views/login.php';
    }

    public function Register() {
      
        $username = $_POST['username'];
        $password = $_POST['password'];
	$email = $_POST['email'];
        $a1 = new AdminModel("test", "test", $this->pdo);
        if($a1->searchUsernameexist($username)==false&&$a1->searchEmailexist($email)==false)
        {
            $a1->createUser($username, $password , $email);
            $_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
        require 'mail.php';

            header('Location: ../index.php?action=post');
        }
        else if ($a1->searchUsernameexist($username)==true) {
            header('Location: ../index.php?action=incorrect');
            $_SESSION['error'] = "Username Existing";
            exit;
        }
        else if ($a1->searchEmailexist($email)==true) {
            header('Location: ../index.php?action=incorrect');
            $_SESSION['error'] = "Email Existing";
            exit;
        }
    
    }

    public function loginuser() {
      
        $username = $_POST['username'];
        $password = $_POST['password'];
        $a1 = new AdminModel("test", "test", $this->pdo);
        if ($a1->searchUser($username, $password)==1) {
            $_SESSION['username'] = $username;
            header('Location: ../index.php?action=post');
            exit;
        } 
        else if ($a1->searchUser($username, $password)==2) {
            $_SESSION['username'] = $username;
            header('Location: ../index.php?action=admin');
            exit;
        }

        else {
            header('Location: ../index.php?action=incorrect');
            $_SESSION['error'] = "Invalid username or password. Please try again.";
            exit;
        }
}
}
?>
