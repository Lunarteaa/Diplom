<?php
// подключение к базе данных
$pdo = new PDO('mysql:host=localhost;dbname=purrfectpets', 'root', '');

// обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // обработка данных из формы
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // проверка наличия пользователя с таким же именем или email
    $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
    $stmt->execute(['username' => $username, 'email' => $email]);
    $user = $stmt->fetch();

    if ($user) {
        // пользователь уже существует, выводим сообщение об ошибке
        echo 'Пользователь с таким именем или email уже зарегистрирован';
    } else {
        // добавление пользователя в базу данных
        $stmt = $pdo->prepare('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)');
        $stmt->execute(['username' => $username, 'email' => $email, 'password' => $password]);

        // выводим сообщение об успешной регистрации
        echo 'Пользователь успешно зарегистрирован';
        header("Location: profile.php");
exit();
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
    <div class="regist"> 
        <h2>Регистрация</h2>
        <form method="post">
    <label for="username">Имя пользователя:</label>
    <input type="text" id="username" name="username" required><br><br>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required><br><br>

    <label for="password">Пароль:</label>
    <input type="password" id="password" name="password" required><br><br>

    <input type="submit" value="Зарегистрироваться">
</form>
<a href="login.php" target="_self">Авторизация</a>
    </div>
    </main>
    </body>
</html>