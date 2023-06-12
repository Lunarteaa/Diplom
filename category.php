<style>
        .product {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ccc;
            margin-top: 60px;
        }
        .product h3 {
            margin-top: 0px;
        }
        .product p {
            margin-bottom: 0px;
        }
        </style>
<?php
$category = $_GET['category'];

if ($category === 'c1') { 
    echo "<h1>Корм для собак</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (135, 137)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c4') {
    echo "<h1>Лежаки и домики</h1>";
    include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (16)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c6') {
    echo "<h1>Миски и кормушки</h1>";
    include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (180)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c9') {
    echo "<h1>Одежда и обувь</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (144)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c11') {
    echo "<h1>Корм для котов</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (1, 3, 4)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c15') {
            echo "<h1>Туалеты для котов</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (39)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c22') {
    echo "<h1>Корм для мелких животных</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (297, 300)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c34') {
    echo "<h1>Клетки</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (322, 348)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c35') {
    echo "<h1>Наполнители для клеток</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (336)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c41') {
    echo "<h1>Аквариумы</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (355)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c42') {
    echo "<h1>Декор</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (387)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c43') {
    echo "<h1>Оборудование для аквариумов</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (361)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c45') {
    echo "<h1>Корм</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (406)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
        } else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

} elseif ($category === 'c46') {
    echo "<h1>Террариумы</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (408)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }}
} elseif ($category === 'c3') {
            echo "<h1>Лакомства для собак</h1>";
                    include 'lib\heder.php';
                    include 'lib\db_connect.php';
                $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (29)";
                $result = $link->query($sql);
        
                // Вывод товаров на страницу
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="product">';
                        
                        // Вывод картинки на страницу
                        echo '<img src="' . $row["photoPath"] . '">';
        
                        echo '<h3>' . $row["name"] . '</h3>';
        
                        $description = $row["description"];
        
                            // Ищем первое вхождение символа конца предложения
                            $firstSentenceEnd = strstr($description, '.');
                            if ($firstSentenceEnd !== false) {
                                // Если найдено, выводим только первое предложение
                                $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                            } else {
                                // Если символ конца предложения не найден, выводим весь текст
                                $firstSentence = $description;
                            }
        
                        echo '<p>' . $firstSentence . '</p>';
        
                        // echo '<p>' . $row["description"] . '</p>';
                        echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';
        
                        echo "<form action='../lib\add_to_cart.php' method='post'>";
                        echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                        echo "<input type='number' name='quantity' value='1'>";
                        echo "<input type='submit' value='Добавить в корзину'>";
                        echo "</form>";
                        echo '</div>';
                    }
        } 
} elseif ($category === 'c5') {
        echo "<h1>Игрушки для собак</h1>";
                include 'lib\heder.php';
                include 'lib\db_connect.php';
            $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (127)";
            $result = $link->query($sql);
    
            // Вывод товаров на страницу
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="product">';
                    
                    // Вывод картинки на страницу
                    echo '<img src="' . $row["photoPath"] . '">';
    
                    echo '<h3>' . $row["name"] . '</h3>';
    
                    $description = $row["description"];
    
                        // Ищем первое вхождение символа конца предложения
                        $firstSentenceEnd = strstr($description, '.');
                        if ($firstSentenceEnd !== false) {
                            // Если найдено, выводим только первое предложение
                            $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                        } else {
                            // Если символ конца предложения не найден, выводим весь текст
                            $firstSentence = $description;
                        }
    
                    echo '<p>' . $firstSentence . '</p>';
    
                    // echo '<p>' . $row["description"] . '</p>';
                    echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';
    
                    echo "<form action='../lib\add_to_cart.php' method='post'>";
                    echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                    echo "<input type='number' name='quantity' value='1'>";
                    echo "<input type='submit' value='Добавить в корзину'>";
                    echo "</form>";
                    echo '</div>';
                }
    }
        else {
            echo "Нет товаров для отображения.";
        }
        include 'lib\footer.php';
        $link->close();

        

}
elseif ($category === 'c7') {
    echo "<h1>Переноски</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (52)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c10') {
    echo "<h1>Лакомства для собак</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (296)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
}} elseif ($category === 'c12') {
    echo "<h1>Наполнители для лотка</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (122)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }

} elseif ($category === 'c16') {
    echo "<h1>Игрушки для котов</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (46)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c20') {
    echo "<h1>Когтеточки</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (129)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    } 
} elseif ($category === 'c23') {
    echo "<h1>Наполнители для клеток</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (302)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c25') {
    echo "<h1>Домики</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (35)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c26') {
    echo "<h1>Игрушки для мелких животных</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (290)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c27') {
    echo "<h1>Клетки</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (314)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c28') {
    echo "<h1>Миски</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (125)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c32') {
    echo "<h1>Корм для птиц</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (74)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c33') {
    echo "<h1>Игрушки для птиц</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (227)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c36') {
    echo "<h1>Кормушки для птиц</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (368)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c40') {
    echo "<h1>Кормдля рыб</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (398)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c44') {
    echo "<h1>Химия для аквариумов</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (93)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c47') {
    echo "<h1>Декор для террариумов</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (49)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c48') {
    echo "<h1>Оборудование для террариумов</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (365)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }
} elseif ($category === 'c49') {
    echo "<h1>Для подготовки воды</h1>";
            include 'lib\heder.php';
            include 'lib\db_connect.php';
        $sql = "SELECT products.*, photoPath FROM products WHERE section_id IN (401)";
        $result = $link->query($sql);

        // Вывод товаров на страницу
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="product">';
                
                // Вывод картинки на страницу
                echo '<img src="' . $row["photoPath"] . '">';

                echo '<h3>' . $row["name"] . '</h3>';

                $description = $row["description"];

                    // Ищем первое вхождение символа конца предложения
                    $firstSentenceEnd = strstr($description, '.');
                    if ($firstSentenceEnd !== false) {
                        // Если найдено, выводим только первое предложение
                        $firstSentence = substr($description, 0, strpos($description, $firstSentenceEnd) + 1);
                    } else {
                        // Если символ конца предложения не найден, выводим весь текст
                        $firstSentence = $description;
                    }

                echo '<p>' . $firstSentence . '</p>';

                // echo '<p>' . $row["description"] . '</p>';
                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';

                echo "<form action='../lib\add_to_cart.php' method='post'>";
                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>";
                echo "<input type='number' name='quantity' value='1'>";
                echo "<input type='submit' value='Добавить в корзину'>";
                echo "</form>";
                echo '</div>';
            }
    }

}else {
    echo "<h1>Неверная категория</h1>";
    echo "<p>Выбрана некорректная категория товаров.</p>";
}
?>