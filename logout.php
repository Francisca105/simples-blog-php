<?php
    include('logic.php');
    if(!Loggedin()) header('Location: /');
    session_destroy();
    header('Location: /?info=loggedout');
?>