<?php
session_start();
$user_id = $_SESSION['user_id']; // Получение ID пользователя из сессии

// Подключение к базе данных и запрос данных пользователя
$pdo = new PDO('mysql:host=localhost;dbname=purrfectpets', 'root', '');
$stmt = $pdo->prepare('SELECT * FROM users WHERE id = :id');
$stmt->execute(['id' => $user_id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);


// обработка отправки формы
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // обработка данных из формы
    $username = $_POST['username'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $birthday = $_POST['birthday'];
    $gender = $_POST['gender'];

    // добавление записи в базу данных
    $stmt = $pdo->prepare('INSERT INTO users (username, address, phone, birthday, gender) VALUES (:username, :address, :phone, :birthday, :gender)');
    $stmt->execute([
        'username' => $username,
        'address' => $address,
        'phone' => $phone,
        'birthday' => $birthday,
        'gender' => $gender,
    ]);

    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Редактирование профиля</title>
</head>
<body>
	<h1>Редактирование профиля</h1>
	<form action="lib\update_profile.php" method="POST">
		<label for="username">Имя:</label>
		<input type="text" name="username" id="username" value="<?php echo $user['username']; ?>"><br><br>

		<label for="email">Email:</label>
		<input type="email" name="email" id="email" value="<?php echo $user['email']; ?>"><br><br>

		<label for="phone">Телефон:</label>
		<input type="tel" name="phone" id="phone" value="<?php echo $user['phone']; ?>"><br><br>

		<label for="birthday">Дата рождения:</label>
		<input type="date" name="birthday" id="birthday" value="<?php echo $user['birthday']; ?>"><br><br>

		<label for="gender">Пол:</label>
		<select name="gender" id="gender">
			<option value="male" <?php echo ($user['gender'] == 'male') ? 'selected' : ''; ?>>Мужской</option>
			<option value="female" <?php echo ($user['gender'] == 'female') ? 'selected' : ''; ?>>Женский</option>
		</select><br><br>

		<label for="address">Адрес:</label>
		<textarea name="address" id="address"><?php echo $user['address']; ?></textarea><br><br>

		<input type="submit" value="Обновить профиль">
	</form>
</body>
</html>
