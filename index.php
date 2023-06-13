<?php
    include('main/connect.php');
    if(isset($_SESSION['id'])){
        header('Location: account.php');
    }
    include('main/header.php');
?>

<div class="block_form">
    <div class="authorization">
        <form action="#" method="post">
            <input type="text" name="login" placeholder="Логин">
            <input type="pass" name="pass" placeholder="Пароль">
            <button>Войти</button>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['login']) && isset($_POST['pass'])){

        $login = htmlspecialchars($_POST['login']);
        $password = password_hash($_POST['pass'], PASSWORD_DEFAULT);

        $push = $DB->query('SELECT * FROM `users` WHERE login = "'.$login.'"');  
        $push->setFetchMode(PDO::FETCH_ASSOC);  
        $row = $push->fetch();

        if(isset($row['login'])){

            //Вход старого пользователя
            if(password_verify($_POST['pass'], $row['password'])){ 
                
                $_SESSION['id'] = $row['id'];
                echo "<script>window.location.href='account.php'</script>";

            }
            else{

                echo "<p class='error'>Неверный пароль</p>";

            }

        }
        else{
            
            //Регистрация и вход нового пользователя
            $date = date('Y-m-d H:i:s');
            $push = $DB->prepare("INSERT INTO `users` (`id`, `login`, `password`, `created_at`) VALUES (NULL, '$login', '$password', '$date');");  
            $push->execute(); 

            $push = $DB->query('SELECT * FROM `users` WHERE login = "'.$login.'"');  
            $push->setFetchMode(PDO::FETCH_ASSOC);  
            $row = $push->fetch();

            $_SESSION['id'] = $row['id'];
            echo "<script>window.location.href='account.php'</script>";

        }

    }

    include('main/footer.php');
?>
