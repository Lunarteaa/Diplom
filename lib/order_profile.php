<?php

    include 'db_connect.php';


    $userId = $_SESSION['user_id'];


    $query = "SELECT order_items.order_id, order_items.price, orders.order_date
            FROM order_items
            JOIN orders ON order_items.order_id = orders.order_id
            WHERE orders.user_id = '$userId'";
    $result = mysqli_query($link, $query);
        $totalPrice = 0;

    if (mysqli_num_rows($result) > 0) {

        while ($row = mysqli_fetch_assoc($result)) {
            $orderId = $row['order_id'];
            $orderDate = $row['order_date'];
            $price = $row['price'];
            $totalPrice += $price * $quantity;

            echo "<p>Номер заказа: $orderId</p>";
            echo "<p>Дата заказа: $orderDate</p>";
            echo "<p>Общая сумма заказа: $totalPrice &#8381;</p>";
        }
    } else {

        echo '<img src="img\noorders.png">';
        echo '<button onclick="window.location.href = \'categories.php\';" id="login_button">В КАТАЛОГ</button>';
    }


    mysqli_close($link);
    ?>