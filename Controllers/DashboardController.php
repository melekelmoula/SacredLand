<?php

require_once('Models/connDb.php');
require_once('Models/DashboardModel.php');
require_once('Models/PostModel.php');
require_once('Models/AdminModel.php');
require_once('Models/commentModel.php');

class DashboardController {
    private $DashboardModel;
    private $pdo; 
    private $username;
    private $postModel;
    private $commentModel;


    public function __construct() {
        $this->pdo = connDb::getInstance()->getPdo();
        $this->DashboardModel = new DashboardModel();
        $this->postModel = new PostModel();
        $this->commentModel = new CommentModel();

    }

    public function index() {
            $users = $this->DashboardModel->getAllusers($this->pdo);
            $posts = $this->DashboardModel->getAllposts($this->pdo);
            $comments = $this->DashboardModel->getAllcomments($this->pdo);

            require('Views/dashboard.php');
    }

    public function addPost() {
        $username = $_SESSION['username'];
        $title = $_POST['title'];
        $content = $_POST['content'];

         $photo_temp = $_FILES['photo']['tmp_name'];
        $original_name = $_FILES['photo']['name'];
        $file_extension = pathinfo($original_name, PATHINFO_EXTENSION); // Get the file extension from the original file name
        $photo_name = $username . '_' . $title . '.' . $file_extension; // Concatenate the file extension to the file name
        $upload_directory = 'uploads/';
        
        move_uploaded_file($photo_temp, $upload_directory . $photo_name);
        
        $this->postModel->insertPost($title, $content, $username, $this->pdo, $photo_name);

        header('Location: ../public/index.php?action=admin');
    }

    public function addUser() {
      
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $a1 = new AdminModel("test", "test", $this->pdo);
        if($a1->searchUsernameexist($username)==false)
        {
            $a1->createUser($username, $password,$email);
            $_SESSION['username'] = $username;
            header('Location: ../public/index.php?action=admin');
        }
        else {
            header('Location: ../public/index.php?action=admin');
            $_SESSION['erroradmin'] = "Username taken";
            exit;
        }
    }

    public function addComment () {
        $username = $_SESSION['username'];
        $comment = $_POST['comment'];
        $post_id = $_POST['post_id'];
        $this->commentModel->insertComment($username, $comment,$post_id);
        header('Location: ../public/index.php?action=admin');
        
    }

    public function deleteComment () {
        $username = $_SESSION['username'];
        $id_comment = $_POST['selected_comment'];
        $this->commentModel->deleteComment($id_comment);
        header('Location: ../public/index.php?action=admin');
        
    }

    public function deletePost () {
        $username = $_SESSION['username'];
        $id_post = $_POST['selected_post'];
        $this->postModel->deletePost($id_post);
        header('Location: ../public/index.php?action=admin');
        
    }

    public function deleteUser () {
        $username = $_SESSION['username'];
        $id_user = $_POST['selected_user'];
        $a1 = new AdminModel("test", "test", $this->pdo);
        $a1->deleteUser($id_user);
        header('Location: ../public/index.php?action=admin');
        
    }
}