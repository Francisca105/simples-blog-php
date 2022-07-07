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
    deleteOne($_GET['id']);
    return header('Location: /?info=deleted');

?>