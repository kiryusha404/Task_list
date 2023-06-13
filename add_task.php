<?php
    include('main/connect.php');

    if(isset($_POST['text'])){ 

        //Добавление новой заметки
        $date = date('Y-m-d H:i:s');
        $text = htmlspecialchars($_POST['text']);

        $push = $DB->prepare("INSERT INTO `tasks` (`id`, `user_id`, `description`, `created_at`, `status`)
        VALUES (NULL, '".$_SESSION['id']."', '$text', '$date', 'red');");  
        $push->execute(); 

    }

    header('Location: account.php');
?>