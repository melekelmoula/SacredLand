<?php require_once 'replace_keywords.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo replaceKeywords('Login'); ?></title>
    <!-- Bootstrap CSS -->
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://i.pinimg.com/564x/b7/5c/0a/b75c0a563165b8c635d02c0cb1abc505.jpg');
          
        }
        .form-section {
           background: rgba(255, 255, 255, 0.9);
            padding: 20px;
            border-radius: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
    <script>
        function toggleForms() {
            var loginForm = document.getElementById("loginForm");
            var registerForm = document.getElementById("registerForm");
            var registerButton = document.getElementById("registerButton");
            var backButton = document.getElementById("backToLogin");

            if (registerForm.style.display === "none") {
                // Show the register form and hide the login form
                loginForm.style.display = "none";
                registerForm.style.display = "block";
                registerButton.style.display = "none";
                backButton.style.display = "block";
            } else {
                // Show the login form and hide the register form
                loginForm.style.display = "block";
                registerForm.style.display = "none";
                registerButton.style.display = "block";
                backButton.style.display = "none";
            }
        }
    </script>
</head>
<body>

<br><br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6 form-section">
<br>

   <!-- Language selection form -->
<form action="index.php" method="post" class="top-right-form mb-4">
    <div class="d-flex flex-wrap">
        <button type="submit" name="lang" value="ar" class="btn btn-link"><?php echo replaceKeywords('عربي'); ?></button>
        <button type="submit" name="lang" value="en" class="btn btn-link"><?php echo replaceKeywords('English'); ?></button>
        <button type="submit" name="lang" value="fr" class="btn btn-link"><?php echo replaceKeywords('French'); ?></button>
    </div>
</form>


            <!-- Login form -->
            <div id="loginForm">
                  
                <form action="index.php?action=loginuser" method="post">
                    <div class="form-group">
                        <label for="username"><?php echo replaceKeywords('Username'); ?></label>
                        <input type="text" name="username" id="login-username" class="form-control" required>
                    </div>
                    <div class="form-group">
<br>
                        <label for="login-password"><?php echo replaceKeywords('Password'); ?></label>
                        <input type="password" name="password" id="login-password" class="form-control" required>
                    </div>
<br>
                    <button type="submit" class="btn btn-primary btn-block"><?php echo replaceKeywords('Login'); ?></button>
                </form>
            </div>

            <!-- Register form (hidden by default) -->
            <div id="registerForm" style="display:none;">
                
                <form action="index.php?action=register" method="post">
                    <div class="form-group">
                        <label for="username"><?php echo replaceKeywords('Username'); ?></label>
                        <input type="text" name="username" id="username" class="form-control" required>
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="password"><?php echo replaceKeywords('Password'); ?></label>
                        <input type="password" name="password" id="password" class="form-control" required>
                    </div>
<br>
                    <button type="submit" class="btn btn-primary btn-block"><?php echo replaceKeywords('Register'); ?></button>
                </form>
            </div>

            <!-- Button to toggle forms and Guest login button -->
            <div class="mt-4 d-flex justify-content-between">
                <button id="registerButton" class="btn btn-secondary" onclick="toggleForms()">
                    <?php echo replaceKeywords('No account?'); ?>
                </button>
                <button id="backToLogin" class="btn btn-secondary" onclick="toggleForms()" style="display:none;">
                    <?php echo replaceKeywords('Do you have an account?'); ?>
                </button>
                <form action="index.php?action=guest" method="post">
                    <button type="submit" class="btn btn-primary"><?php echo replaceKeywords('Guest'); ?></button>
                </form>
            </div>

            <!-- Error message display -->
            <br>
            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-danger"><?php echo $_SESSION['error']; ?></div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
    
        </div>
    </div>
</div>

</body>
</html>
