<?php
session_start();
include("db_connect.php");


if ($_SERVER['REQUEST_METHOD'] === "POST") {
  
    $product_id = $_POST['product_id'];


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


$sql = "SELECT id, name FROM products";
$result = $link->query($sql);
?>