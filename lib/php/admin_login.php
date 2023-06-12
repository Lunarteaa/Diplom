<?php
session_start();
include("lib/db_connect.php");

// Проверка, что форма была отправлена
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Поиск администратора в базе данных по email
    $sql = "SELECT * FROM admins WHERE email = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    // Проверка наличия администратора и соответствия пароля
    if ($result->num_rows === 1 && password_verify($password, $row['password'])) {
        // Сохранение id администратора в сессии
        $_SESSION['admin_id'] = $row['id'];

        // Перенаправление на страницу администратора
        header("Location: admin.php");
        exit();
    } else {
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
    <link rel="stylesheet" href="css/logreg.css">
    <title>Вход в административную панель</title>
</head>
<body>
<?php include 'lib\heder.php'; ?>
    <main>
        <?php
        // Проверка, авторизован ли уже администратор
        if (isset($_SESSION['admin_id'])) {
            header("Location: admin.php");
            exit();
        }
        ?>

        <div class="regist">
            <h2>Вход в административную панель</h2>
            <form method="post" action="admin_login.php" class="correct">
                <label for="email">Email:</label>
                <input type="email" name="email" class="input_corr_log" required>

                <label for="password">Пароль:</label>
                <input type="password" name="password" class="input_corr_log" required>

                <button>Войти</button>
            </form>
        </div>
    </main>
    <?php include("lib/footer.php"); ?>
</body>
</html>