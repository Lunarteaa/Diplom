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
        <link rel="stylesheet" href="css\testing.css">
        <title>Профиль</title>
    </head>
    <body>
        <?php include 'lib\heder.php'; ?>
        <main>
            <div class="two_blocks">
                <div class="block_one">
                    <h1>Профиль</h1>
                    <div class="tabs">
                        <div class="tab active" data-tab="tab1">Личные данные</div>
                        <div class="tab" data-tab="tab2">Адреса доставки</div>
                        <div class="tab" data-tab="tab3">Мои заказы</div>
                        <div class="tab" data-tab="tab4">Редактировать профиль</div>
                    </div>
                </div>
                <div class="block_two">
                    <div class="tab-content active" data-tab="tab1" id="win_1">
                        <h3>Личные данные</h3>
                        <div class="win_1_flex">
                            <div>
                                <h4>ФИО</h4> <p class="answer"><?php echo $row['username']; ?></p>
                            </div>
                            <div>
                                <h4>День рождения</h4> <p class="answer"><?php echo $row['birthday']; ?></p>
                            </div>
                            <div>
                                <h4>Пол</h4> <p class="answer"><?php echo $row['gender']; ?></p>
                            </div>
                            <div>
                                <h4>Номер телефона</h4> <p class="answer"><?php echo $row['phone']; ?></p>
                            </div>
                            <div>
                                <h4>Почта</h4> <p class="answer"><?php echo $row['email']; ?></p>
                            </div>
                        </div>
                        <form method="post" action="logout.php">
                            <input type="submit" value="Выйти" id="login_button">
                        </form>
                    </div>

                    <div class="tab-content" data-tab="tab2">
                        <div id="win_2">
                            <div>
                                <h3>Адреса доставки</h3>
                                <p>Текущий адрес<br><?php echo $row['address']; ?></p>
                                <button onclick="window.location.href = 'test.php';" id="login_button">Добавить адрес</button>
                            </div>
                            <div class="win_2_flex">
                                <h4>Зачем добавлять адреса?</h4>
                                <div>
                                    <ul>
                                        <li>Не придется вводить адрес при оформлении заказа;</li>
                                        <li>Можно добавить несколько адресов, например, рабочий и домашний.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-content" data-tab="tab3">
                        <h3>Мои заказы</h3>
                        <div  id="win_3">
                                <img src="img\noorders.png">
                                <button onclick="window.location.href = 'categories.php';" id="login_button">В КАТАЛОГ</button>
                        </div>
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
                        <?php include 'lib\heder.php'; ?>
                        <div id="win_4">
                            <form action="lib\update_profile.php" method="POST" id="win_4_flex">
                                <div>
                                    <label for="username">Имя:</label>
                                    <input type="text" name="username" id="username" value="<?php echo $user['username']; ?>">
                                </div>
                                <div>
                                    <label for="email">Email:</label>
                                    <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>">
                                </div>
                                <div>
                                    <label for="phone">Телефон:</label>
                                    <input type="tel" name="phone" id="phone" value="<?php echo $user['phone']; ?>">
                                </div>
                                <div>
                                    <label for="birthday">Дата рождения:</label>
                                    <input type="date" name="birthday" id="birthday" value="<?php echo $user['birthday']; ?>">
                                </div>
                                <div>
                                    <label for="gender">Пол:</label>
                                    <select name="gender" id="gender">
                                        <option value="Мужской" <?php echo ($user['gender'] == 'Мужской') ? 'selected' : ''; ?>>Мужской</option>
                                        <option value="Женский" <?php echo ($user['gender'] == 'Женский') ? 'selected' : ''; ?>>Женский</option>
                                    </select>
                                </div>
                                <div>
                                    <label for="address">Адрес:</label>
                                    <textarea name="address" id="address"><?php echo $user['address']; ?></textarea>
                                </div>
                                <div>
                                    <button id="login_button">Обновить профиль</button>
                                </div> 
                            </form>
                        </div>
                        </body>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="js/profile.js"></script>
        </main>
        <?php include 'lib\footer.php'; ?>
    </body>
</html>