<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_SESSION['user_id'])) {
        $productId = $_POST['product_id'];
        $quantity = $_POST['quantity'];

        
        addToCart($productId, $quantity);
    } else {
        
        echo '<script>';
        echo 'alert("Ошибка: Для добавления товара в корзину необходимо авторизоваться.");';
        echo 'window.history.back();'; 
        echo '</script>';
    }
}


function addToCart($productId, $quantity) {
    include 'db_connect.php';
    
    if ($link->connect_error) {
        die("Ошибка подключения: " . $link->connect_error);
    }

    
    $sql = "INSERT INTO shopping_cart (user_id, product_id, quantity, price) VALUES (?, ?, ?, ?)";

    
    $stmt = $link->prepare($sql);

    
    $price = 10; 

    
    $stmt->bind_param("iiid", $_SESSION['user_id'], $productId, $quantity, $price);

    
    $stmt->execute();

    
    if ($stmt->affected_rows > 0) {
        
        echo '<script>';
        echo 'alert("Товар успешно добавлен в корзину.");';
        echo 'window.history.back();'; 
        echo '</script>';

    } else {
        echo '<script>';
        echo 'alert("Ошибка добавления товара в корзину.");';
        echo 'window.history.back();'; 
        echo '</script>';
    }

    
    $stmt->close();
    $link->close();
}
?>
