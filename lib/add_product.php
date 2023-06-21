<?php
    session_start();
        include("db_connect.php");

          
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
         
            $name = $_POST['name'];
            $description = $_POST['description'];
            $photoPath = $_POST['photoPath'];
            $price = $_POST['price'];
            $section_id = $_POST['section_id'];

            $sql = "INSERT INTO products (name, description, photoPath, price, section_id) VALUES (?, ?, ?, ?, ?)";
            $stmt = $link->prepare($sql);
            $stmt->bind_param("sssdi", $name, $description, $photoPath, $price, $section_id);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Новый товар успешно добавлен в базу данных.";
            } else {
                echo "Ошибка при добавлении нового товара.";
            }

         $stmt->close();
         $link->close();
    }

?>