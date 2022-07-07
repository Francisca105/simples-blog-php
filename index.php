<?php
    include('logic.php');
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
        <?php
        if(!Loggedin()) echo '<a href="/login.php" class="btn btn-outline-light active float-right" role="button" aria-pressed="true">Login</a>';
        else echo '<a href="/logout.php" class="btn btn-outline-light active float-right" role="button" aria-pressed="true">Logout</a>'
        ?>
    
    <br><br><br>
    <?php
        if(isset($_GET['info'])) {
            $info = $_GET['info'];
            if($info == 'added') {
                echo '<div class="alert alert-success" role="alert">Post created successfully!</div>';
            }

            if($info == 'notfound') {
                echo '<div class="alert alert-danger" role="alert">Post not found!</div>';
            }

            if($info == 'edited') {
                echo '<div class="alert alert-success" role="alert">Post edited successfully!</div>';
            }
            
            if($info == 'deleted') {
                echo '<div class="alert alert-success" role="alert">Post deleted successfully!</div>';
            }

            if($info == 'loginfailed') {
                echo '<div class="alert alert-danger" role="alert">Login failed.</div>';
            }

            if($info == 'login') {
                echo '<div class="alert alert-success" role="alert">You are now logged-in!</div>';
            }

            if($info == 'loggedout') {
                echo '<div class="alert alert-success" role="alert">You are now logged-out.</div>';
            }

            if($info == 'noperm') {
                echo '<div class="alert alert-danger" role="alert">Unauthorized!</div>';
            }
        }
    ?>

<div class="card-deck">
    <?php

        foreach($all as $post) {
            $content = $post['content'];
            $text = (strlen($content) > 50) ? substr($content,0,50).'...' : $content;

            echo '<div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">'.$post['title'].'</h5>
              <p class="card-text">'.$text.'</p>
              <a href="/view.php?id='.$post['id'].'" class="card-link">Read more</a>';
            if(Loggedin()) echo '<a href="/delete.php?id='.$post['id'].'" class="card-link float-right">Delete</a><a href="/edit.php?id='.$post['id'].'" class="card-link float-right">Edit</a>';
            echo '</div></div>';
        }

    ?>
</div>

        <br>
        <?php
        if(Loggedin()) echo '<div class="text-center">
            <a href="create.php" class="btn btn-outline-dark">+ Create a new post</a>
        </div>'
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>