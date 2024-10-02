<?php


require_once('Models/connDb.php');
require_once('Models/PostModel.php');
class PostController {
    private $postModel;
    private $pdo; 
    private $username;

    public function __construct() {
        $this->pdo = connDb::getInstance()->getPdo();
        $this->postModel = new PostModel();
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function index() {
            $posts = $this->postModel->getAllPosts($this->pdo);
            require('Views/posts.php');
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

    header('Location: index.php?action=post');
    exit(); // Always add exit after header redirection to stop further script execution
}

    public function showPost($postId) {
        $post = $this->postModel->getPostById($postId);
        $postModel = new PostModel();
        $post = $postModel->getPostById($postId);
        $comments = $postModel->getCommentsByPostId($postId);
  	
	require('Views/post_view.php');
    }

    public function processComment() {
        // Check if the form is submitted
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postId = $_POST['postId'];
            $username = $_SESSION['username'];
            $content = $_POST['content'];
            // Validate inputs (e.g., check for empty fields)

            // Instantiate PostModel
            $postModel = new PostModel();

            // Insert comment
            $postModel->insertComment($postId, $username, $content);

            // Redirect back to the post view page
            header("Location: index.php?action=showPost&postId=$postId");
            
        } else {
            // Handle invalid requests
            echo "Invalid request";
        }
    }


}

?>
