<?php
    include('main/connect.php');
    if(!isset($_SESSION['id'])){
        header('Location: index.php');
    }
    include('main/header.php');
?>
<a href="logout.php"><h4>Выйти</h4></a>
<hr>
    <div class="add_task">
        <form action="add_task.php" method="post">
            <input name="text" required placeholder="Enter text...">
            <button class="add_button"><b>ADD TASK</b></button>
        </form>
        <div>
            <a href="remove_all.php"><button class="button_task h_button"><b>REMOVE ALL</b></button></a>
            <a href="ready_all.php"><button class="button_task"><b>READY ALL</b></button></a>
        </div>
    </div>
<hr>

<?php
    //Вывод списка задач отдельного пользователя
    $push = $DB->query('SELECT * FROM `tasks` WHERE user_id = "'.$_SESSION['id'].'"');  
    $push->setFetchMode(PDO::FETCH_ASSOC);  
    while($row = $push->fetch()){
?>

<div class="element_list add_task">
            <div class="block w">
                <p><?php echo $row['description']; ?></p>
                <a href="ready_task.php?id=<?php echo $row['id']; ?>"><button class="button_task h_button"><b><?php if($row['status'] == 'green'){ echo "UN";} ?>READY</b></button></a>
                <a href="remove_task.php?id=<?php echo $row['id']; ?>"><button class="button_task marg"><b>DELETE</b></button></a>
            </div>
            <div class="status <?php echo $row['status']; ?> block">
            </div>
        </div>
<hr>  

<?php
    }
?>

    </div>

<?php
    include('main/footer.php');
?>
