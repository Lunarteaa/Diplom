<?php
session_start();
include("db_connect.php");

// Проверка, что форма была отправлена
if ($_SERVER['REQUEST_METHOD'] === "POST") {
    // Получение выбранного товара для удаления
    $product_id = $_POST['product_id'];

    // Подготовка SQL запроса для удаления товара
    $sql = "DELETE FROM products WHERE id = ?";
    $stmt = $link->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "Товар успешно удален.";
    } else {
        echo "Ошибка при удалении товара.";
    }

    $stmt->close();
}

// Получение списка товаров для отображения в форме
$sql = "SELECT id, name FROM products";
$result = $link->query($sql);
?>