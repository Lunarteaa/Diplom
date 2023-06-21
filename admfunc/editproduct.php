<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\feedback.css">
    <link rel="stylesheet" href="..\css\universal.css">
    <title>Редактирование товара</title>
</head>

<body>
    <?php include("..\lib\hederadm.php"); ?>
    <main>
        <section class="part_2nd">
            <h1 id="left_align">Редактировать товар</h1>
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
                    echo "<div class='row_in_2nd'>";
                        echo "<div class='semi-block'>";
                            echo "<form  method='post' action='editproduct.php'>";
                                echo "<div class='form_flex'>";
                                    echo "<input type='hidden' name='product_id' value='$productId' class='input_corr_log input_corr_1'>";
                                    echo "<label for='name'>Название:</label>";
                                    echo "<input type='text' name='name' value='" . $product['name'] . "' class='input_corr_log input_corr_1'><br>";
                                echo "</div>";
                                echo "<div class='form_flex'>";
                                    echo "<label for='photoPath'>Путь к фото:</label>";
                                    echo "<input type='text' name='photoPath' value='" . $product['photoPath'] . "' class='input_corr_log input_corr_1'><br>";
                                echo "</div>";
                                echo "<div class='form_flex'>";
                                    echo "<label for='price'>Цена:</label>";
                                    echo "<input type='text' name='price' value='" . $product['price'] . "' class='input_corr_log input_corr_1'><br>";
                                echo "</div>";
                            echo "</form>";
                        echo "</div>";
                    echo "<div>";
                    echo "<div class='form_flex'>";
                        echo "<label for='description'>Описание:</label>";
                        echo "<textarea name='description' class='input_corr_log input_corr_2'>" . $product['description'] . "</textarea><br>";
                    echo "</div>";
                    echo "<div class='form_flex'>";
                        echo "<input type='submit' value='Обновить' class='input_corr_log input_corr_4'>";
                    echo "</div>";
                    echo "<div class='form_flex'>";
                        echo "<button type='submit' class='input_corr_log input_corr_4' >";
                            // Проверяем, была ли установлена предыдущая страница
                            if (isset($_SERVER['HTTP_REFERER'])) {
                                echo "<a href='{$_SERVER['HTTP_REFERER']}' id='color_standart'>Назад</a>";
                            } else {
                                echo "<a href='index.php' id='color_standart'>Назад</a>";
                            }
                        echo "</button>";
                    // echo "</div>";
                    // echo "</div>";
                } else {
                    echo "Товар с указанным ID не найден.";
                }
            } else {
                echo "<div class='row_in_3rd'>";
                echo "<div class='semi-block'>";
                // Получение списка всех товаров
                $sql = "SELECT * FROM products";
                $result = mysqli_query($link, $sql);

                // Проверка наличия товаров
                if (mysqli_num_rows($result) > 0) {
                    echo "<form method='get' action='editproduct.php'>";
                    echo "<select name='product_id' class='input_corr_5'>";

                    // Вывод каждого товара в виде опции в выпадающем списке
                    while ($row = mysqli_fetch_assoc($result)) {
                        $productId = $row['id'];
                        $productName = $row['name'];

                        // Создание опции с информацией о товаре
                        echo "<option value='$productId'>$productName</option>";
                    }
                    echo "</select>";
                    echo "<div class='form_flex'>";
                    echo "<input type='submit' value='Выбрать' class='input_corr_log input_corr_4' id='color_green'>";
                    echo "</div>";
                    echo "</form>";
                    echo "<div class='form_flex'>";
                    echo "<button type='submit' class='input_corr_log input_corr_4' >";
                    // Проверяем, была ли установлена предыдущая страница
                    if (isset($_SERVER['HTTP_REFERER'])) {
                        echo "<a href='{$_SERVER['HTTP_REFERER']}' id='color_standart'>Назад</a>";
                    } else {
                        echo "<a href='index.php' id='color_standart'>Назад</a>";
                    }
                    echo "</button>";
                    echo "</div>";
                } else {
                    echo "Нет товаров для редактирования.";
                }
            }
            mysqli_close($link);
            ?>
            </div>
            </div>
        </section>
    </main>
    <?php include("..\lib/footeradm.php"); ?>
</body>

</html>