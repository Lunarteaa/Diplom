<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>Document</title>
</head>
<body>
    <main> 
    <?php
include_once('php\simple_html_dom.php');

// URL страницы, которую мы будем парсить
$url = 'https://www.petshop.ru/catalog/dogs/odezd/all/';

// Получаем HTML-код страницы
$html = file_get_html($url);

// Находим контейнер с товарами
$productsContainer = $html->find('.CatalogProducts_content__sAzhV', 0);

// Получаем список товаров
$products = $productsContainer->find('.CatalogItem_mobile__b+J33 CatalogItem_tablet__V38M4 CatalogItem_desktop__sVmIs CatalogItem_container__xZCy1');

// Проходимся по каждому товару и выводим нужную информацию
foreach ($products as $product) {
    $productName = $product->find('.CatalogItem_name__shuU7', 0)->plaintext;
    $productPrice = $product->find('.Price_price__r9uMR CatalogItem_price_val__currentprice__K2pP2 Price_bold__4EywU', 0)->plaintext;
    $productImage = $product->find('.CatalogItem_img__WxJJG', 0)->src;

    // Выводим информацию о товаре в HTML
    echo "<div class='product'>";
    echo "<h2>$productName</h2>";
    echo "<img src='$productImage'>";
    echo "<p>$productPrice</p>";
    echo "</div>";
}

?>
      
    </main>
    
</body>
</html>