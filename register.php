<?php
    include('logic.php');
    if(Loggedin()) header('Location: /');

    if(isset($_POST['password']) & isset($_POST['username'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = 'SELECT * FROM auth WHERE user = ?';
        $pstat = $mysql->prepare($sql);
        $pstat->bind_param("s", $username);
        $pstat->execute();
        $pstat->store_result();
        $rows = $pstat->num_rows;
        if($rows > 0) {
            $_SESSION['login'] = false;
            header('Location: /?info=registerfailed');
            exit();
        }

        $pstat = $mysql->prepare('INSERT INTO `auth` (`user`, `password`) VALUES (?, ?)');
        $pstat->bind_param("ss", $username, password_hash($password, PASSWORD_BCRYPT));
        $pstat->execute();

        header('Location: /login.php');
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
        <a href="/login.php" class="btn btn-outline-light btn-lg active" role="button" aria-pressed="true">Login</a>
        <br><br><br>
        <form class="form-inline" method="POST">
        <div class="form-group mb-2">
            <div class="input-group-prepend">
                <div class="input-group-text">@</div>
            </div>
            <label for="email" class="sr-only">Username</label>
            <input type="text" class="form-control" id="email" name="username" placeholder="Username" required>
        </div>
        <div class="form-group mx-sm-3 mb-2">
            <label for="password" class="sr-only">Password</label>
            <input type="password" class="form-control" id="password" name="password"placeholder="Password" required>
        </div>
        <br>
        <button type="submit" class="btn btn-primary mb-2">Register</button>
    </form>
</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>

</html>