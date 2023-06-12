<?php
session_start();

// Подключение к базе данных
include 'lib\db_connect.php';


// Получение идентификатора пользователя из сессии
$userId = $_SESSION['user_id'];

// Запрос на получение товаров в корзине пользователя
$query = "SELECT shopping_cart.*, products.name, products.price, products.photoPath FROM shopping_cart
          INNER JOIN products ON shopping_cart.product_id = products.id
          WHERE shopping_cart.user_id = '$userId'";
$result = mysqli_query($link, $query);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Корзина</title>
    <style>
        .product {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .product h3 {
            margin-top: 0;
        }
        .product p {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
<?php include 'lib\heder.php'; ?>

    <h1>Корзина</h1>

    <?php
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="product">';
            echo '<img src="' . $row["photoPath"] . '">';
            echo '<h3>' . $row["name"] . '</h3>';
            echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';
            echo '<p>Количество: ' . $row["quantity"] . '</p>';
            echo '<a href="lib\delete_from_cart.php?product_id=' . $row["product_id"] . '">Удалить</a>';
            echo '</div>';
        }
    } else {
        echo "Корзина пуста.";
    }
    ?>

    <?php include 'lib\footer.php'; ?>
</body>
</html>

<?php
// Закрываем соединение с базой данных
mysqli_close($link);
?>