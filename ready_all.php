<?php
    include('main/connect.php');

        //Изменение всех заметок на выполнено        
        $push = $DB->prepare("UPDATE `tasks` SET `status` = 'green' WHERE `tasks`.`user_id` = '".$_SESSION['id']."';");  
        $push->execute(); 

    header('Location: account.php');
?>
