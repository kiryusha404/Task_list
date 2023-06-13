<?php
    include('main/connect.php');

        $id_task = $_GET['id'];

        //Проверка пренадлежит ли запись именно этому пользователю
        $push = $DB->query("SELECT * FROM `tasks` WHERE `tasks`.`id` = '$id_task'");  
        $push->setFetchMode(PDO::FETCH_ASSOC);  
        $row = $push->fetch();

        if($row['user_id'] == $_SESSION['id']){

        //Удаление заметки     
        $push = $DB->prepare("DELETE FROM `tasks` WHERE `tasks`.`id` = '$id_task';");  
        $push->execute(); 

        }

    header('Location: account.php');
?>