<?php
session_start();
require_once 'replace_keywords.php'; // Add this line
require_once 'vendor/autoload.php'; // Add this line
if(isset($_POST['lang'])) {
    $_SESSION['lang'] = $_POST['lang']; // Store selected language in session
}

$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

switch ($action) {
    case 'register':
        require('Controllers/AdminController.php');
        $loginController = new AdminController();
        $loginController->Register();
        break;

    case 'loginuser':
        require('Controllers/AdminController.php');
        $loginController = new AdminController();
        $loginController->loginuser();
        break;

    case 'admin':
           
        require('controllers/DashboardController.php');
        $dashboardController = new DashboardController();
        $dashboardController->index();
        $_SESSION['erroradmin'] = "";
        break;

    case 'guest':
        $_SESSION['username']=null;
        require('Controllers/PostController.php');
        $postController = new PostController();
        $postController->index();
        break;

    case 'logout':
      session_destroy();
	header("Location: index.php");
	exit();

    case 'incorrect':
        require('Controllers/AdminController.php');
        $loginController = new AdminController();
        $loginController->index();
        break;

    case 'post':
        require('Controllers/PostController.php');
        $postController = new PostController();
        $postController->index();
        break;

    case 'addPost':
        require('Controllers/PostController.php');
        $postController = new PostController();
        $postController->addPost();
        break;

    case 'addPostadmin':
        require('Controllers/DashboardController.php');
        $dashboardController = new DashboardController();
        $dashboardController->addPost();
        break;

    case 'addUseradmin':
        require('Controllers/DashboardController.php');
        $dashboardController = new DashboardController();
        $dashboardController->adduser();
        break;    

    case 'addCommentadmin':
        require('Controllers/DashboardController.php');
        $dashboardController = new DashboardController();
        $dashboardController->addcomment();
        break;  

    case 'deletecommentadmin':
        require('Controllers/DashboardController.php');
        $dashboardController = new DashboardController();
        $dashboardController->deleteComment();
        break;  

    case 'deletepostadmin':
        require('Controllers/DashboardController.php');
        $dashboardController = new DashboardController();
        $dashboardController->deletePost();
        break;  

    case 'deleteuseradmin':
        require('Controllers/DashboardController.php');
        $dashboardController = new DashboardController();
        $dashboardController->deleteUser();
        break; 

    case 'showPost':
        $postId = isset($_GET['postId']) ? $_GET['postId'] : null;
        if ($postId) {
        require('Controllers/PostController.php');
        $postController = new PostController();
        $postController->showPost($postId);}
        else {}
        break;

    case 'showPost&postId=postId':
        $postId = isset($_GET['postId']) ? $_GET['postId'] : null;
        if ($postId) {
        require('Controllers/PostController.php');
        $postController = new PostController();
        $postController->showPost($postId);}
        else {}
        break;

    case 'addcomment':
        require('Controllers/PostController.php');
        $postController = new PostController();
        $postController->processComment();
        break;  
        
    default:
        require('Controllers/AdminController.php');
        $loginController = new AdminController();
        $loginController->index();
        break;
}
?>
