<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="..\css\feedback.css">
    <link rel="stylesheet" href="..\css\universal.css">
    <title>Удаление товара</title>
</head>

<body>
    <?php include("..\lib\hederadm.php"); ?>
    <main>
        <section class="part_2nd">
            <h1 id="left_align">Удалить товар</h1>
            <div class="row_in_3rd">
                <div class="semi-block">
                    <?php include("..\lib\delete_product.php"); ?>
                    <form method="post" action="">
                        <div class="form_flex">
                            <select name="product_id" class="input_corr_5">
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form_flex">
                            <button type="submit" class="input_corr_4" id='color_red'>Удалить</button>
                        </div>
                        <div class="form_flex">
                            <button class="input_corr_4">
                                <?php
                                // Проверяем, была ли установлена предыдущая страница
                                if (isset($_SERVER['HTTP_REFERER'])) {
                                    echo "<a href='{$_SERVER['HTTP_REFERER']}' id='color_standart'>Назад</a>";
                                } else {
                                    // Если предыдущая страница неизвестна, можно указать URL, на который нужно вернуться
                                    echo "<a href='index.php' id='color_standart'>Назад</a>";
                                }
                                ?>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>
    <?php include("..\lib/footeradm.php"); ?>
</body>

</html>