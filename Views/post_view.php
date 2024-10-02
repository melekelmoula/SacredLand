<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $post['title']; ?></title>
       <link href="vendor/twbs/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://www.roasted813.com/cdn/shop/files/F743D044-CC81-4E3F-AEF2-8D21833975FF.jpg?v=1699894736');
           
        }
    </style>
</head>
<body>

<div class="container mt-5" style="background-color: #333; color: white; border-radius: 10px; padding: 20px;">
    <h1><?php echo $post['title']; ?></h1>
    <p><?php echo $post['content']; ?></p>
    <p><?php echo $post['username']; ?></p>
    <p><?php echo $post['created_at']; ?></p>
    <img src="uploads/<?php echo $post['photo']; ?>" alt="Post Image">


        <?php
        if (isset($_SESSION['username']) && $_SESSION['username'] !== null):
        ?>
        
        <?php foreach ($comments as $comment) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <p class="card-text"><?php echo $comment['username']; ?>: <?php echo $comment['comment']; ?></p>
                    <p class="card-text"><small class="text-muted"><?php echo $comment['created_at']; ?></small></p>
                </div>
            </div>
        <?php endforeach; ?>

        
        <form action="index.php?action=addcomment" method="post" class="mt-4">
            <div class="form-group">
                <label for="content"><?php echo replaceKeywords('Comment'); ?></label>
                <textarea class="form-control" name="content" id="content" rows="3"></textarea> <!-- Changed name to "content" -->
            </div>
            <input type="hidden" name="postId" value="<?php echo $post['id']; ?>">
            <button type="submit" class="btn btn-primary"><?php echo replaceKeywords('Add Comment'); ?></button>
        </form>
    </div>
    <?php endif; ?>
</body>
</html>
