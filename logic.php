<?php
    session_start();

    $db = '';
    $host = '';
    $user = '';
    $pass = '';
    $mysql = new mysqli($host, $user, $pass, $db);
    #$criar_tabela_sql = 'CREATE TABLE `'.$db.'`.`blog` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `content` LONGTEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;';
    #$criar_tabela2_sql = 'CREATE TABLE `'.$db.'`.`auth` ( `id` INT NOT NULL AUTO_INCREMENT , `user` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;';

    if($mysql->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        die();
        exit();
    }

    $sql_all = 'SELECT * FROM `blog`';

    $all = $mysql->query($sql_all);

    function findOne($id) {
        $result = $GLOBALS['mysql']->query('SELECT * FROM blog WHERE id = \''.$id.'\'');
        return $result->fetch_object();;
    }

    function deleteOne($id) {
        return $GLOBALS['mysql']->query('DELETE FROM `blog` WHERE `id`='.$id);
    }

    
    function Loggedin () {
        if(empty($_SESSION['login'])) return false;
        return true;
    }
?>