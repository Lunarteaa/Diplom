<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Категегории</title>
    <link rel="stylesheet" href="/css/category.css">
</head>
<body>
    
<?php
$category = $_GET['category'];
include 'lib\heder.php';
include 'lib\db_connect.php';
$title;
$sql;
switch($category) {
    case 'c1':
        $title = "<h1 class='title_h'>Корм для собак</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (135, 137)";
        break;
    case 'c3':
        $title = "<h1 class='title_h'>Лакомства для собак</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (29)";
        break;
    case 'c4';
        $title = "<h1 class='title_h'>Лежаки и домики</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (16)";
        break;
    case 'c5':
        $title = "<h1 class='title_h'>Игрушки для собак</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (127)";
        break;
    case 'c6':
        $title = "<h1 class='title_h'>Миски и кормушки</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (180)";
        break;
    case 'c7':
        $title = "<h1 class='title_h'>Переноски</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (52)";
        break;
    case 'c9':
        $title = "<h1 class='title_h'>Одежда и обувь</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (144)";
        break;
    case 'c10':
        $title = "<h1 class='title_h'>Защита от блох и клещей</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (296)";
        break;
    case 'c11':
        $title = "<h1 class='title_h'>Корм для котов</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (1, 3, 4)";
        break;
    case 'c12':
        $title = "<h1 class='title_h'>Наполнители для лотка</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (122)";
        break;
    case 'c15':
        $title = "<h1 class='title_h'>Туалеты для котов</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (39)";
        break;
    case 'c16':
        $title = "<h1 class='title_h'>Игрушки для котов</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (46)";
        break;
    case 'c20':
        $title = "<h1 class='title_h'>Когтеточки</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (129)";
        break;
    case 'c22':
        $title = "<h1 class='title_h'>Корм для мелких животных</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (297, 300)";
        break;
    case 'c23':
        $title = "<h1 class='title_h'>Наполнители для клеток</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (302)";
        break;
    case 'c25':
        $title = "<h1 class='title_h'>Домики</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (35)";
        break;
    case 'c26':
        $title = "<h1 class='title_h'>Игрушки для мелких животных</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (290)";
        break;
    case 'c27':
        $title = "<h1 class='title_h'>Клетки</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (314)";
        break;
    case 'c28':
        $title = "<h1 class='title_h'>Миски</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (125)";
        break;
    case 'c32':
        $title = "<h1 class='title_h'>Корм для птиц</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (74)";
        break;
    case 'c33':
        $title = "<h1 class='title_h'>Игрушки для птиц</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (227)";
        break;
    case 'c34':
        $title = "<h1 class='title_h'>Клетки</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (322, 348)";
        break;
    case 'c35':
        $title = "<h1 class='title_h'>Наполнители для клеток</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (336)";
        break;
    case 'c36':
        $title = "<h1 class='title_h'>Кормушки для птиц</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (368)";
        break;
    case 'c40':
        $title = "<h1 class='title_h'>Корм для рыб</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (398)";
        break;
    case 'c41':
        $title = "<h1 class='title_h'>Аквариумы</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (355)";
        break;
    case 'c42':
        $title = "<h1 class='title_h'>Декор</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (387)";
        break;
    case 'c43':
        $title = "<h1 class='title_h'>Оборудование для аквариумов</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (361)";
        break;
    case 'c44':
        $title = "<h1 class='title_h'>Химия для аквариумов</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (93)";
        break;
    case 'c45':
        $title = "<h1 class='title_h'>Корм</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (406)";
        break;
    case 'c46':
        $title = "<h1 class='title_h'>Террариумы</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (408)";
        break;
    case 'c47':
        $title = "<h1 class='title_h'>Декор для террариумов</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (49)";
        break;
    case 'c48':
        $title = "<h1 class='title_h'>Оборудование для террариумов</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (365)";
        break;
    case 'c49':
        $title = "<h1 class='title_h'>Для подготовки воды</h1>";
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (401)";
        break;
} 
$result = $link->query($sql);



if ($result->num_rows > 0) {
    echo $title;
    echo '<div class="product-list">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="product">';
                echo '<div id = "product_img">';
                    echo '<img src="' . $row["photoPath"] . '">';
                echo '</div>'; 
                echo "<div class='text'>";
                    echo "<div class='name'>";
                        echo '<h3>' . $row["name"] . '</h3>';
                    echo "</div";
                    echo "<div class='descrip'>";
                        if ($category !== 'c9') {
                            $description = $row["description"];
                        }
                        if ($category !== 'c9') {
                            
                            $firstSentenceEnd = strstr($description, '.');
                            if ($firstSentenceEnd !== false) {
                              
                                $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                            } else {
                                
                                $firstSentence = $description;
                            }
                            echo "<details>";
                            echo "<summary>Описание</summary>";
                            echo '<p>' . $firstSentence . '</p>';
                            echo "</details>";
                            }  else {
                            echo '<p>Описание не задано.</p>';
                            }
                    echo "</div>";
                    echo "<div class='price'>";
                        echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';
                        echo "<form action='../lib\add_to_cart.php' method='post'>";
                        echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                        echo "<input type='number' name='quantity' value='1' class='count'>";
                        echo "<input type='submit' value='Добавить в корзину' class='buy'>";
                        echo "</form>";
                    echo "</div>";
                echo '</div>';
            echo '</div>';
        }
    echo '</div>';
} else {
    echo "Нет товаров для отображения.";
}
include 'lib\footer.php';
$link->close();
?>
<script src="js/toggle-burger.js"></script>
</body>
</html>
