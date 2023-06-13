<?php
    include('main/connect.php');

        //Удаление всех заметок       
        $push = $DB->prepare("DELETE FROM `tasks` WHERE `tasks`.`user_id` = '".$_SESSION['id']."';");  
        $push->execute(); 

    header('Location: account.php');
?>
