<?php
	session_start();
	include ("lib\db_connect.php");

	// проверка, что форма была отправлена
	if ($_SERVER['REQUEST_METHOD'] == "POST")
	{
		$email = $_POST['email'];
		$password = $_POST['password'];

		// поиск пользователя в базе данных
		$sql = "SELECT * FROM users WHERE email='$email'";
		$result = mysqli_query($link, $sql);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

		// если пользователь найден и пароль верный
		if (mysqli_num_rows($result) == 1 && password_verify($password, $row['password']))
		{

			// сохраняем id пользователя в сессию
			$_SESSION['user_id'] = $row['id'];

			// перенаправляем на страницу профиля
			header("Location: profile.php");
			exit();
		}
		else
		{
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
    <title>Вход в ЛК</title>
</head>
<body>
	<?php include 'lib\heder.php'; ?>
    <main>
    	<?php
			// если пользователь авторизован, перенаправляем на страницу профиля
			session_start();
			if (isset($_SESSION['user_id']))
			{
				header("Location: profile.php");
				exit();
			}
		?>

		<div class="regist"> 
			<h2>Вход в личный кабинет</h2>
			<form method="post" action="login.php" class="correct">
				<label for="email">Email:</label>
				<input type="email" name="email" class="input_corr_log" required>

				<label for="password">Пароль:</label>
				<input type="password" name="password" class="input_corr_log" required>

				<button>Войти</button>
			</form>
			<a href="registr.php" target="_self">Регистрация</a>
			<a href="admin.php" target="_self">Администратор</a>
		</div>
    </main>
	<?php include 'lib\footer.php'; ?>
</body>
</html>
