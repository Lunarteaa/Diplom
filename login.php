<?php 
session_start();
include("lib\db_connect.php");

// проверка, что форма была отправлена
if($_SERVER['REQUEST_METHOD'] == "POST"){
	$email = $_POST['email'];
	$password = $_POST['password'];

	// поиск пользователя в базе данных
	$sql = "SELECT * FROM users WHERE email='$email'";
	$result = mysqli_query($link, $sql);
	$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

	// если пользователь найден и пароль верный
	if(mysqli_num_rows($result) == 1 && password_verify($password, $row['password'])){

		// сохраняем id пользователя в сессию
		$_SESSION['user_id'] = $row['id'];

		// перенаправляем на страницу профиля
		header("Location: profile.php");
		exit();
	}else{
		echo "Неверный email или пароль.";
	}
}

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
    <?php 
	// если пользователь авторизован, перенаправляем на страницу профиля
	session_start();
	if(isset($_SESSION['user_id'])){
		header("Location: profile.php");
		exit();
	}
	?>

    <div class="regist"> 
    <h2>Вход в личный кабинет</h2>
    <form method="post" action="login.php">
		<label for="email">Email:</label>
		<input type="email" name="email" required>

		<label for="password">Пароль:</label>
		<input type="password" name="password" required>

		<input type="submit" value="Войти">
	</form>
<a href="registr.php" target="_self">Регистрация</a>
    </div>
    </main>
    </body>
</html>