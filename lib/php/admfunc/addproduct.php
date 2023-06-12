<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Добавление товара</title>
    </head>
    <body>
        <!-- <?php include("..\lib\hederadm.php");?> -->
        <main>
        <h3>Добавить товар</h3>
        <?php include("..\lib\add_product.php");?>
                                        <form method="post" action="addproduct.php" class="correct">
                                        <label for="name">Название:</label>
                                        <input type="text" name="name" class="input_corr_log" required>
                                        </br>
                                        <label for="description">Описание:</label>
                                        <textarea name="description" class="input_corr_log" required></textarea>
                                        </br>
                                        <label for="photoPath">Путь к фото:</label>
                                        <input type="text" name="photoPath" class="input_corr_log" required>
                                        </br>
                                        <label for="price">Цена:</label>
                                        <input type="number" name="price" class="input_corr_log" required>
                                        </br>
                                        <label for="section_id">ID раздела:</label>
                                        <input type="number" name="section_id" class="input_corr_log" required>
                                        </br>
                                        <button type="submit">Добавить товар</button>
                                        </form>
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