<?php
// Define language arrays
if (isset($_POST['language'])) {
    $_SESSION['language'] = $_POST['language'];
    header("Location: ".$_SERVER['HTTP_REFERER']); // Redirect back to the previous page
}
