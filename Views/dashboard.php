
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>

    <link href="../vendor/milligram/milligram/dist/milligram.min.css" rel="stylesheet">

				 
</head>
<body>
<div class="container">
    <!-- Users Table -->
    <div class="card">
        <div class="card-header">
            <h2 class="card-title">Users</h2>
        </div>
        <div class="card-body">
            <form action="index.php?action=deleteuseradmin" method="post">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!-- PHP code to populate users table -->
                    <?php foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['id']; ?></td>
                            <td><?php echo $user['username']; ?></td>
                            <td><?php echo $user['password']; ?></td>
                            <td><?php echo $user['role']; ?></td>
                            <td><input type="radio" name="selected_user" value="<?php echo $user['id']; ?>"></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <input type="submit" class="button button-outline" value="Delete">
            </form>
            <hr>
            <form action="index.php?action=addUseradmin" method="post">
                <div class="form-group">
                    <label>Username</label>
                    <input type="text" class="form-control" name="username" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" required>
                </div>
                <input type="submit" class="button" value="Add">
            </form>
        </div>
    </div>

    <!-- Posts Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h2 class="card-title">All Posts</h2>
        </div>
        <div class="card-body">
            <form action="index.php?action=deletepostadmin" method="post" >
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Content</th>
                        <th>Username</th>
                        <th>Create at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($posts as $post): ?>
                        <tr>
                            <td><?php echo $post['id']; ?></td>
                            <td><?php echo $post['title']; ?></td>
                            <td><?php echo $post['content']; ?></td>
                            <td><?php echo $post['username']; ?></td>
                            <td><?php echo $post['created_at']; ?></td>
                            <td><input type="radio" name="selected_post" value="<?php echo $post['id']; ?>"></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <input type="submit" class="button button-outline" value="Delete">
            </form>
            <hr>
            <form action="index.php?action=addPostadmin" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea class="form-control" name="content" required></textarea>
                </div>
                <div class="form-group">
                    <label>photo</label>
                    <input type="file" class="form-control-file" id="photo" accept="image/*" name="photo">
                </div>
                <input type="submit" class="button" value="Add">
            </form>
        </div>
    </div>

    <!-- Comments Table -->
    <div class="card mt-4">
        <div class="card-header">
            <h2 class="card-title">Comments</h2>
        </div>
        <div class="card-body">
            <form action="index.php?action=deletecommentadmin" method="post">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Comment</th>
                        <th>Post ID</th>
                        <th>Create at</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($comments as $comment): ?>
                        <tr>
                            <td><?php echo $comment['id']; ?></td>
                            <td><?php echo $comment['username']; ?></td>
                            <td><?php echo $comment['comment']; ?></td>
                            <td><?php echo $comment['post_id']; ?></td>
                            <td><?php echo $comment['created_at']; ?></td>
                            <td><input type="radio" name="selected_comment" value="<?php echo $comment['id']; ?>"></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
                <input type="submit" class="button button-outline" value="Delete">
            </form>
            <hr>
            <form action="index.php?action=addCommentadmin" method="post">
                <div class="form-group">
                    <label>Comment</label>
                    <input type="text" class="form-control" name="comment" required>
                </div>
                <div class="form-group">
                    <label>Post ID</label>
                    <input type="text" class="form-control" name="post_id" required>
                </div>
                <input type="submit" class="button" value="Add">
            </form>
        </div>
    </div>
</div>
</body>
</html>
