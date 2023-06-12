<?php
    session_start();

    // Проверка, авторизован ли администратор
    if (!isset($_SESSION['admin_id'])) {
        header("Location: admin_login.php");
        exit();
    }

    // Дальнейший код административной панели
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Административная панель</title>
    </head>
    <body>
        <?php include 'lib\heder.php'; ?>
        <h1>Добро пожаловать в панель администратора</h1>
        <h3><a href="admfunc\addproduct.php">Добавить товар</a></h3>
        <h3><a href="admfunc\dellproduct.php">Удалить товар</a></h3>
        <h3><a href="admfunc\editproduct.php">Редактировать товар</a></h3>
        
                        <form method="post" action="logout.php">
                            <input type="submit" value="Выйти" id="login_button">
                        </form>
    <?php include 'lib/footer.php'; ?>
</body>
</html>