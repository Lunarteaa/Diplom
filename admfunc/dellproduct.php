<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Удаление товара</title>
    </head>
    <body>
        <?php include("..\lib\hederadm.php");?>
        <main>
        <h3>Удалить товар</h3>
        <?php include("..\lib\delete_product.php");?>
                        <form method="post" action="">
                            <select name="product_id">
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
                                <?php } ?>
                            </select>
                            <button type="submit">Удалить</button>
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