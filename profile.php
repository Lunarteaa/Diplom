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
    <!-- <link rel="stylesheet" href="css/header.css"> -->
    <link rel="stylesheet" href="css\testing.css">
    
    <title>Профиль</title>
</head>
<body>
<?php include 'lib\heder.php'; ?>
    <main>
    <h2>Профиль</h2>
        <div class="tabs">
  <div class="tab active" data-tab="tab1">Профиль</div>
  <div class="tab" data-tab="tab2">Адреса доставки</div>
  <div class="tab" data-tab="tab3">Мои заказы</div>
  <div class="tab" data-tab="tab4">Редактировать профиль</div>
</div>

<div class="tab-content active" data-tab="tab1">
<h3>Личные данные</h3>
	<p>Имя<br> <?php echo $row['username']; ?></p>
	<p>Email <br><?php echo $row['email']; ?></p>
    <p>Номер телефона <br><?php echo $row['phone']; ?></p>
    <p>День рождения<br><?php echo $row['birthday']; ?></p>
    <p>Пол<br><?php echo $row['gender']; ?></p>

	<form method="post" action="logout.php">
		<input type="submit" value="Выйти">
	</form>
</div>

<div class="tab-content" data-tab="tab2">
<h3>Адреса доставки</h3>
<p>Текущий адрес<br><?php echo $row['address']; ?></p>
<h4>Зачем добавлять адреса?</h4>
<ul>
    <li>Не придется вводить адрес при оформлении заказа;</li>
    <li>Можно добавить несколько адресов, например, рабочий и домашний.</li>
	<button onclick="window.location.href = 'test.php';">Добавить адрес</button>
</ul>
</div>

<div class="tab-content" data-tab="tab3">
<h3>Заказы</h3>
<img src="img\noorders.png">
<button>В КАТАЛОГ</button>
</div>
<div class="tab-content" data-tab="tab4">
<h3>Редактировать профиль</h3>
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
<?php include 'lib\heder.php'; ?>
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
<!-- <a href="test.php" class="link_head">тест</a> -->

</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="js/profile.js"></script>

    </main>
    <?php include 'lib\footer.php'; ?>
</body>
</html>