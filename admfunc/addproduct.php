<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\feedback.css">
    <link rel="stylesheet" href="..\css\universal.css">
    <title>Добавление товара</title>
</head>

<body>
    <?php include("..\lib\hederadm.php"); ?>
    <main>
        <section class="part_2nd">
            <h1 id="left_align">Добавить товар</h1>
            <div class="row_in_2nd">
                <div class="semi-block">
                    <?php include("..\lib\add_product.php"); ?>
                    <form method="post" action="addproduct.php" class="correct">
                        <div class="form_flex">
                            <label for="name">Название:</label>
                            <input type="text" name="name" class="input_corr_log input_corr_1" required>
                        </div>
                        <div class="form_flex">
                            <label for="photoPath">Путь к фото:</label>
                            <input type="text" name="photoPath" class="input_corr_log input_corr_1" required>
                        </div>
                        <div class="form_flex">
                            <label for="price">Цена:</label>
                            <input type="number" name="price" class="input_corr_log input_corr_1" required>
                        </div>
                        <div class="form_flex">
                            <label for="section_id">ID раздела:</label>
                            <input type="number" name="section_id" class="input_corr_log input_corr_1" required>
                        </div>
                    </form>
                </div>
                <div>
                    <div class="form_flex">
                        <label for="description">Описание:</label>
                        <textarea name="description" class="input_corr_log input_corr_2" required></textarea>
                    </div>
                    <div class="form_flex">
                        <button type="submit" class="input_corr_log input_corr_4" id="color_green">Добавить товар</button>
                    </div>
                    <div class="form_flex">
                        <button type="submit" class="input_corr_log input_corr_4">
                            <?php
                            // Проверяем, была ли установлена предыдущая страница
                            if (isset($_SERVER['HTTP_REFERER'])) {
                                echo "<a href='{$_SERVER['HTTP_REFERER']}' id='color_standart'>Назад</a>";
                            } else {
                                echo "<a href='index.php' id='color_standart'>Назад</a>";
                            }
                            ?>
                        </button>
                    </div>
                </div>
            </div>
        </section>


    </main>
    <?php include("..\lib/footeradm.php"); ?>
</body>

</html>