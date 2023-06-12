<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверяем, аутентифицирован ли пользователь
    if (isset($_SESSION['user_id'])) {
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        // Добавляем товар в корзину
        addToCart($productId, $quantity);
    } else {
        header("Location: registration.php");
    }
}
// Определение функции addToCart()
function addToCart($productId, $quantity) {
    include 'db_connect.php';
   // Проверка соединения
   if ($link->connect_error) {
       die("Ошибка подключения: " . $link->connect_error);
   }

   // Подготовка SQL-запроса
   $sql = "INSERT INTO shopping_cart (user_id, product_id, quantity) VALUES (?, ?, ?)";
   
   // Создание подготовленного выражения
   $stmt = $link->prepare($sql);

   // Привязка параметров
   $stmt->bind_param("iii", $_SESSION['user_id'], $productId, $quantity);

   // Выполнение подготовленного выражения
   $stmt->execute();

   // Проверка результата выполнения запроса
   if ($stmt->affected_rows > 0) {
       // Товар успешно добавлен в корзину
       echo "Товар успешно добавлен в корзину.";
       echo '<br><a href="/cart.php">Перейти в корзину</a>'; // Ссылка на страницу "Корзина"
        echo '<br><a href="javascript:history.back()">Назад</a>'; // Ссылка "Назад"
   } else {
       // Произошла ошибка при добавлении товара в корзину
       echo "Ошибка при добавлении товара в корзину.";
       echo '<br><a href="/cart.php">Перейти в корзину</a>'; // Ссылка на страницу "Корзина"
       echo '<br><a href="javascript:history.back()">Назад</a>'; // Ссылка "Назад"
   }

   // Закрытие подготовленного выражения и соединения с базой данных
   $stmt->close();
   $link->close();
}
?>