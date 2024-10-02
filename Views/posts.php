<?php require_once 'replace_keywords.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo replaceKeywords('All Posts'); ?></title>
    <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://www.roasted813.com/cdn/shop/files/F743D044-CC81-4E3F-AEF2-8D21833975FF.jpg?v=1699894736');
       background-size: cover;
        }
    </style>
</head>
<body>
<div class="container mt-5">
   <br>  <br>  <br>

    <div class="row">
        <div class="col-md-8">
            <ul class="list-group">
                <?php foreach ($posts as $post): ?>
                    <li class="list-group-item">
                        <h3 class="mb-1"><a href="index.php?action=showPost&postId=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h3>
                        <p class="mb-1"><?php echo replaceKeywords('Username'); ?> <?php echo $post['username']; ?></p>
                        <p class="mb-1"><?php echo replaceKeywords('Created at'); ?> <?php echo $post['created_at']; ?></p>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-4">
            <?php if (isset($_SESSION['username']) && $_SESSION['username'] !== null): ?>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo replaceKeywords('Add Post'); ?></h5>
                        <form action="index.php?action=addPost" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="title" class="form-label"><?php echo replaceKeywords('Title'); ?></label>
                                <input type="text" class="form-control" id="title" name="title" required>
                            </div>
                            <div class="mb-3">
                                <label for="content" class="form-label"><?php echo replaceKeywords('Content'); ?></label>
                                <textarea class="form-control" id="content" name="content" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="photo" class="form-label"><?php echo replaceKeywords('Photo'); ?></label>
                                <input type="file" class="form-control-file" id="photo" accept="image/*" name="photo">
                            </div>
                            <button type="submit" class="btn btn-primary"><?php echo replaceKeywords('Add Post'); ?></button>
                        </form>
                    </div>
                </div>

                
            <?php endif; ?>
 <form action="index.php?action=logout" method="post">
                    <button type="submit" class="btn btn-danger"><?php echo replaceKeywords('Logout'); ?></button>
                </form>
        </div>

    </div>

</div>


               
</body>
</html>
