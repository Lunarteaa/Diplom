<?php
session_start();

include 'db_connect.php';

// Получение идентификатора пользователя из сессии
$userId = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Получение текущего количества товара в корзине
    $query = "SELECT quantity FROM shopping_cart WHERE user_id = '$userId' AND product_id = '$productId'";
    $result = mysqli_query($link, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $quantity = $row['quantity'];

        if ($quantity > 1) {
            // Уменьшение количества товара на 1
            $newQuantity = $quantity - 1;
            $updateQuery = "UPDATE shopping_cart SET quantity = '$newQuantity' WHERE user_id = '$userId' AND product_id = '$productId'";
            mysqli_query($link, $updateQuery);
        } else {
            // Удаление записи из корзины
            $deleteQuery = "DELETE FROM shopping_cart WHERE user_id = '$userId' AND product_id = '$productId'";
            mysqli_query($link, $deleteQuery);
        }
    }

    // Перенаправление обратно на страницу корзины
    header("Location: /cart.php");
    exit();
} else {
    // Некорректный запрос - перенаправление на страницу корзины
    header("Location: /cart.php");
    exit();
}

// Закрытие соединения с базой данных
mysqli_close($link);
?>