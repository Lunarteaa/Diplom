<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="/css/category.css">
</head>
<body>
    
<?php include 'lib\heder.php'; ?>
<div class= "product-list">
<h1 class="title_h">Корзина</h1>
<?php
session_start();


if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}


include 'lib\db_connect.php';



$userId = $_SESSION['user_id'];


$query = "SELECT shopping_cart.*, products.name, products.price, products.photoPath FROM shopping_cart
          INNER JOIN products ON shopping_cart.product_id = products.id
          WHERE shopping_cart.user_id = '$userId'";
$result = mysqli_query($link, $query);

    echo '<div class="product-list">';
    $totalPrice = 0;
    if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                
                echo '<div class="product">';
                    echo '<div>';
                        echo '<img src="' . $row["photoPath"] . '">';
                    echo '</div>';
                    echo "<div class='text'>";
                        echo "<div class='name'>";
                            echo '<h3>' . $row["name"] . '</h3>';
                        echo '</div>';
                        echo "<div class='price_cart'>";
                            echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';
                            echo '<p>Количество: ' . $row["quantity"] . '</p>';
                            echo '<a class="buy_cart" href="lib\delete_from_cart.php?product_id=' . $row["product_id"] . '">Удалить</a>';
                            $totalPrice += $row["price"] * $row["quantity"];
                        echo "</div>";
                    echo "</div>";
                echo '</div>';  
                
            }
    } else {
        echo "Корзина пуста.";
    }
    echo '</div>';


mysqli_close($link);
?>
    <div class="total_flex">
        <p id="p_total">Общая сумма: <?php echo $totalPrice; ?> &#8381;</p>
        <button class="buy buy2" onclick="location.href='order_make.php';">Оформить заказ</button>
    </div>
</div>
    <?php include 'lib\footer.php'; ?>
    <script src="js/toggle-burger.js"></script>
</body>
</html>