<!DOCTYPE html>
<html>
<head>
<title>Заказ</title>
</head>
<body>
<?php include("lib\heder.php");?>
<?php
session_start();


include 'lib/db_connect.php';


$userId = $_SESSION['user_id'];


$query = "SELECT shopping_cart.*, products.name, products.price FROM shopping_cart
          INNER JOIN products ON shopping_cart.product_id = products.id
          WHERE shopping_cart.user_id = '$userId'";
$result = mysqli_query($link, $query);


$totalPrice = 0;


if (mysqli_num_rows($result) > 0) {
    
    $orderDate = date('Y-m-d H:i:s');
    $insertOrderQuery = "INSERT INTO orders (user_id, order_date, order_status) VALUES ('$userId', '$orderDate', 'Оформлен')";
    mysqli_query($link, $insertOrderQuery);
    $orderId = mysqli_insert_id($link);


    while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['product_id'];
        $quantity = $row['quantity'];
        $price = $row['price'];
        $totalPrice += $price * $quantity;
        $insertOrderItemQuery = "INSERT INTO order_items (order_id, product_id, quantity, price) VALUES ('$orderId', '$productId', '$quantity', '$price')";
        mysqli_query($link, $insertOrderItemQuery);
    }


    $clearCartQuery = "DELETE FROM shopping_cart WHERE user_id = '$userId'";
    mysqli_query($link, $clearCartQuery);


    echo "<h1>Заказ оформлен</h1>";
    echo "<p>Номер заказа: $orderId</p>";
    echo "<p>Дата заказа: $orderDate</p>";
    echo "<p>Общая сумма заказа: $totalPrice &#8381;</p>";

} else {
    echo "<h1>Корзина пуста</h1>";
}


mysqli_close($link);
?>
<button onclick="location.href='profile.php';">В профиль</button>
<button onclick="location.href='main.php';">На главную</button>
<?php include 'lib\footer.php';?>
<script src="js/toggle-burger.js"></script>
</body>
</html>