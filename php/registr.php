<?php
// подключение к базе данных
$pdo = new PDO('mysql:host=localhost;dbname=purrfectpets', 'root', '');

// обработка отправки формы
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        // обработка данных из формы
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // проверка наличия пользователя с таким же именем или email
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username OR email = :email');
        $stmt->execute(['username' => $username, 'email' => $email]);
        $user = $stmt->fetch();

        if ($user)
        {
            // пользователь уже существует, выводим сообщение об ошибке
            echo 'Пользователь с таким именем или email уже зарегистрирован';
        }
        else
        {
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
    <link rel="stylesheet" href="css/logreg.css">
    <title>Регистрация</title>
</head>
<body>
    <?php include 'lib\heder.php'; ?>
    <main>
        <div class="regist"> 
            <h2>Регистрация</h2>
            <form method="post" class="correct">
                <label for="username">Имя пользователя:</label>
                <input type="text" id="username" name="username" class="input_corr_log" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" class="input_corr_log" required>

                <label for="password">Пароль:</label>
                <input type="password" id="password" name="password" class="input_corr_log" required>

                <button>Зарегистрироваться</button>
            </form>
            <a href="login.php" target="_self">Авторизация</a>
        </div>
    </main>
    <?php include 'lib\footer.php'; ?>
</body>
</html>
