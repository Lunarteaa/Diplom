<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Редактирование товара</title>
    </head>
    <body>
        <?php include("..\lib\hederadm.php");?>
        <main>
        <h3>Редактировать товар</h3>

        <?php
// параметры подключения к базе данных
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'purrfectpets';

// подключение к базе данных
$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}

// Проверка, был ли отправлен запрос на обновление товара
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['product_id'];
    $name = mysqli_real_escape_string($link, $_POST['name']);
    $description = mysqli_real_escape_string($link, $_POST['description']);
    $photoPath = mysqli_real_escape_string($link, $_POST['photoPath']);
    $price = $_POST['price'];

    // Запрос на обновление товара
    $sql = "UPDATE products SET name='$name', description='$description', photoPath='$photoPath', price='$price' WHERE id=$productId";
    if (mysqli_query($link, $sql)) {
        echo "Товар успешно обновлен.";
    } else {
        echo "Ошибка при обновлении товара: " . mysqli_error($link);
    }
}

// Проверка, был ли выбран товар для редактирования
if (isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];

    // Запрос на получение информации о выбранном товаре
    $sql = "SELECT * FROM products WHERE id = $productId";
    $result = mysqli_query($link, $sql);
    $product = mysqli_fetch_assoc($result);

    if ($product) {
        // Форма обновления товара
        echo "<form method='post' action='editproduct.php'>";
        echo "<input type='hidden' name='product_id' value='$productId'>";
        echo "<label for='name'>Название:</label>";
        echo "<input type='text' name='name' value='" . $product['name'] . "'><br>";
        echo "<label for='description'>Описание:</label>";
        echo "<textarea name='description'>" . $product['description'] . "</textarea><br>";
        echo "<label for='photoPath'>Путь к фото:</label>";
        echo "<input type='text' name='photoPath' value='" . $product['photoPath'] . "'><br>";
        echo "<label for='price'>Цена:</label>";
        echo "<input type='text' name='price' value='" . $product['price'] . "'><br>";
        echo "<input type='submit' value='Обновить'>";
        echo "</form>";
    } else {
        echo "Товар с указанным ID не найден.";
    }
} else {
    // Получение списка всех товаров
    $sql = "SELECT * FROM products";
    $result = mysqli_query($link, $sql);

    // Проверка наличия товаров
    if (mysqli_num_rows($result) > 0) {
        echo "<form method='get' action='editproduct.php'>";
        echo "<select name='product_id'>";

        // Вывод каждого товара в виде опции в выпадающем списке
        while ($row = mysqli_fetch_assoc($result)) {
            $productId = $row['id'];
            $productName = $row['name'];

            // Создание опции с информацией о товаре
            echo "<option value='$productId'>$productName</option>";
        }

        echo "</select>";
        echo "<input type='submit' value='Выбрать'>";
        echo "</form>";
    } else {
        echo "Нет товаров для редактирования.";
    }
}

mysqli_close($link);
?>
<?php
// Проверяем, была ли установлена предыдущая страница
if (isset($_SERVER['HTTP_REFERER'])) {
    echo "<a href='{$_SERVER['HTTP_REFERER']}'>Назад</a>";
} else {
    // Если предыдущая страница неизвестна, можно указать URL, на который нужно вернуться
    echo "<a href='index.php'>Назад</a>";
}
?>
    <?php include("..\lib/footeradm.php");?>
</main>
</body>
</html>