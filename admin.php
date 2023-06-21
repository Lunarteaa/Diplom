<?php
    session_start();


    if (!isset($_SESSION['admin_id'])) {
        header("Location: admin_login.php");
        exit();
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/admin.css">
<title>Административная панель</title>
</head>
<body>
    <?php include 'lib\heder.php'; ?>
    <main>  
        <div class="admin_flex">
            <div>
                <h1>Добро пожаловать в панель администратора</h1>
            </div>
            <div>
                <div class="block"><a href="admfunc\addproduct.php">Добавить товар</a></div>
                <div class="block"><a href="admfunc\dellproduct.php">Удалить товар</a></div>
                <div class="block"><a href="admfunc\editproduct.php">Редактировать товар</a></div>
                <form id="login_button"  class="block" method="post" action="logout.php">
                    <input type="submit" value="Выйти" id="login_button">
                </form>
            </div>
        </div>
    </main> 
    <?php include 'lib/footer.php'; ?>
    <script src="js/toggle-burger.js"></script>
</body>
</html>