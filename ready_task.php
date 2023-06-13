<?php
    include('main/connect.php');

        $id_task = $_GET['id'];

        //Проверка пренадлежит ли запись именно этому пользователю
        $push = $DB->query("SELECT * FROM `tasks` WHERE `tasks`.`id` = '$id_task'");  
        $push->setFetchMode(PDO::FETCH_ASSOC);  
        $row = $push->fetch();

        //Проверка статуса и изменение его на другой
        if($row['user_id'] == $_SESSION['id']){

            if($row['status'] == 'green'){

                $push = $DB->prepare("UPDATE `tasks` SET `status` = 'red' WHERE `tasks`.`id` = '$id_task';");  

            }
            else{

                $push = $DB->prepare("UPDATE `tasks` SET `status` = 'green' WHERE `tasks`.`id` = '$id_task';");  

            }

        $push->execute(); 

        }

    header('Location: account.php');
?>