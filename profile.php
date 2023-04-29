<?php
session_start();
include("lib\db_connect.php");

// проверка, что пользователь авторизован
if(!isset($_SESSION['user_id'])){
	header("Location: index.php");
	exit();
}

// поиск пользователя в базе данных
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id='$user_id'";
$result = mysqli_query($link, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/logreg.css">
    <title>Регистрация</title>
</head>
<body>
<header>
        <nav id="space_t">
            <div id="logo_t">
                <img src="img/logo.svg">
                <a href="main.html"  class="link_head"><p id="name_t"><span id="letter">P</span>urrfect <span id="letter">P</span>ets</p></a>  
            </div>
            <ul id="row_ul">
                <li id="header_li"><a href="categories.html" class="link_head">Каталог</a></li>
                <li id="header_li"><a href="about.html" class="link_head">О нас</a></li>
                <li id="header_li"><a href="dilivery.html" class="link_head">Доставка</a></li>
                <li id="header_li"><a href="login.php" class="link_head">Личный кабинет</a></li>
            </ul>
            <img src="img/cart.svg" alt="корзина" id="button_purchase">
        </nav>
    </header>
    <main>
	<h2>Профиль пользователя</h2>
	<p>Имя: <?php echo $row['username']; ?></p>
	<p>Email: <?php echo $row['email']; ?></p>

	<form method="post" action="logout.php">
		<input type="submit" value="Выйти">
	</form>
    </main>
</body>
</html>