<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
</head>
<body>
    <?php foreach($posts as $post){
        echo "<div>{$post['content']}</div>";
    }?>
</body>
</html>