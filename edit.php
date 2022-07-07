<?php
    include('logic.php');
    
    if(!Loggedin()) header('Location: /?info=noperm');

    if(!isset($_GET['id'])) {
        return header('Location: /?info=notfound');
    } 
    $este = findOne($_GET['id']);
    if(!isset($este)) {
        return header('Location: /?info=notfound');
    } 

    if(isset($_POST['content']) & isset($_POST['title'])) {
        $content = $_POST['content'];
        $title = $_POST['title'];

        $mysql->query('UPDATE `blog` SET `title` = \''.$title.'\', `content` = \''.$content.'\' WHERE `blog`.`id` = '.$_GET['id']);
        header('Location: /?info=edited');
        exit();
    }
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <a href="/" class="btn btn-outline-light btn-lg active" role="button" aria-pressed="true">Home</a>

        <div class="text-center">
            <form method="POST">
                <input type="text" placeholder="Blog Title" class="form-control my-3 bg-transparent text-black text-center" name="title" value="<?php echo $este->title ?>" required>
                <textarea name="content" placeholder="Blog Description" class="form-control my-3 bg-transparent text-black" cols="30" rows="10" required><?php echo $este->content ?></textarea>
        </div>
        <div class="text-right">
            <button class="btn btn-success" name="new_post">Edit</button>
        </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>