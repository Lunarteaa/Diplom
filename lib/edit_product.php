<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'purrfectpets';


$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}


$sql = "SELECT * FROM products";
$result = mysqli_query($link, $sql);


if (mysqli_num_rows($result) > 0) {
    echo "<form method='get' action='editproduct.php'>";
    echo "<select name='product_id'>";


    while ($row = mysqli_fetch_assoc($result)) {
        $productId = $row['id'];
        $productName = $row['name'];


        echo "<option value='$productId'>$productName</option>";
    }

    echo "</select>";
    echo "<input type='submit' value='Выбрать'>";
    echo "</form>";
} else {
    echo "Нет товаров для редактирования.";
}

mysqli_close($link);
?>






