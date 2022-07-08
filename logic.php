<?php
    session_start();

    $db = '';
    $host = '';
    $user = '';
    $pass = '';
    $mysql = new mysqli($host, $user, $pass, $db);
    $criar_tabela_sql = 'CREATE TABLE IF NOT EXISTS `'.$db.'`.`blog` ( `id` INT NOT NULL AUTO_INCREMENT , `title` VARCHAR(255) NOT NULL , `content` LONGTEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;';
    $criar_tabela2_sql = 'CREATE TABLE IF NOT EXISTS`'.$db.'`.`auth` ( `id` INT NOT NULL AUTO_INCREMENT , `user` VARCHAR(255) NOT NULL , `password` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;';

    if($mysql->connect_errno) {
        printf("Connection failed: %s\n", $mysqli->connect_error);
        die();
        exit();
    }

    $sql_all = 'SELECT * FROM `blog`';
    $mysql->query($criar_tabela_sql);
    $mysql->query($criar_tabela2_sql);
    $all = $mysql->query($sql_all);

    function findOne($id) {
        $pstat = $GLOBALS["mysql"]->prepare("SELECT * FROM blog WHERE id = ?");
        $pstat->bind_param("i", $id);
        $pstat->execute();
        $result = $pstat->get_result();
        return $result->fetch_object();
    }

    function deleteOne($id) {
        $pstat = $GLOBALS["mysql"]->prepare("DELETE FROM blog WHERE id = ?");
        $pstat->bind_param("i", $id);
        $pstat->execute();
    }

    
    function Loggedin () {
        if(empty($_SESSION['login'])) return false;
        return true;
    }
?>