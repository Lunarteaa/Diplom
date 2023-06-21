<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Главная</title>
  </head>

  <body>
    <?php include 'lib\hederm.php'; ?>
    <main>
      <section id="nav_catalog">
        <div>
          <img src="img/dog_cat.svg">
          <p>Для собак</p>
          <ul>
            <li><a href="category.php?category=c1">Корм</a></li>
            <li><a href="category.php?category=c3">Лакомства</a></li>
            <li><a href="category.php?category=c4">Лежаки и домики</a></li>
            <li><a href="category.php?category=c5">Игрушки</a></li>
            <li><a href="category.php?category=c6">Миски, кормушки, поилки</a></li>
            <li><a href="category.php?category=c7">Сумки и переноски</a></li>
            <li><a href="category.php?category=c9">Одежда и обувь</a></li>
            <li><a href="category.php?category=c10">Защита от блох и клещей</a></li>
          </ul>
        </div>
        <div>
          <img src="img/cat_cat.svg">
          <p>Для кошек</p>
          <ul>
            <li><a href="category.php?category=c11">Корм</a></li>
            <li><a href="category.php?category=c12">Наполнители</a></li>
            <li><a href="category.php?category=c7">Переноски</a></li>
            <li><a href="category.php?category=c4">Лежаки</a></li>
            <li><a href="category.php?category=c15">Туалеты</a></li>
            <li><a href="category.php?category=c16">Игрушки</a></li>
            <li><a href="category.php?category=c6">Миски</a></li>
            <li><a href="category.php?category=c20">Когтеточки</a></li>
            <li><a href="category.php?category=c10">Защита от блох и клещей</a></li>
          </ul>
        </div>
        <div>
          <img src="img/mouse_cat.svg">
          <p>Для мелких животных</p>
          <ul>
            <li><a href="category.php?category=c22">Корм и лакомства</a></li>
            <li><a href="category.php?category=c23">Наполнители</a></li>
            <li><a href="category.php?category=c25">Домики</a></li>
            <li><a href="category.php?category=c26">Игрушки</a></li>
            <li><a href="category.php?category=c27">Клетки</a></li>
            <li><a href="category.php?category=c28">Миски</a></li>
          </ul>
        </div>
        <div>
          <img src="img/parrot_cat.svg">
          <p>Для птиц</p>
          <ul>
            <li><a href="category.php?category=c32">Корм и лакомства</a></li>
            <li><a href="category.php?category=c33">Игрушки</a></li>
            <li><a href="category.php?category=c34">Клетки</a></li>
            <li><a href="category.php?category=c35">Наполнители</a></li>
            <li><a href="category.php?category=c36">Кормушки</a></li>
          </ul>
        </div>
        <div>
          <img src="img/fish_cat.svg">
          <p>Аквариумистика</p>
          <ul>
            <li><a href="category.php?category=c40">Корм и лакомства</a></li>
            <li><a href="category.php?category=c41">Аквариумы</a></li>
            <li><a href="category.php?category=c42">Декор</a></li>
            <li><a href="category.php?category=c43">Оборудование</a></li>
            <li><a href="category.php?category=c44">Химия</a></li>
          </ul>
        </div>
        <div>
          <img src="img/chameleon_cat.svg">
          <p>Террариумистика</p>
          <ul>
            <li><a href="category.php?category=c45">Корм и лакомства</a></li>
            <li><a href="category.php?category=c46">Террариумы</a></li>
            <li><a href="category.php?category=c47">Декор</a></li>
            <li><a href="category.php?category=c48">Оборудование</a></li>
            <li><a href="category.php?category=c49">Для подготовки воды</a></li>
          </ul>
        </div>
      </section>

      <section id="hello"></section>
      <script src="./js/slider.js"></script>
      <script src="./js/slider_mobile.js"></script>

      <section class="part">
        <h2 class="name_block">Товары, которые часто покупают</h2>
        <div class="part_2nd">
          <div class="row_in">
            <?php
              include 'lib\db_connect.php';
              $query = "SELECT * FROM products WHERE id IN ('270', '220', '198', '81')";
              $result = mysqli_query($link, $query);
              if (mysqli_num_rows($result) > 0) {
                  $index = 1;
                  while ($row = mysqli_fetch_assoc($result)) {
                      echo '<div class="goods">';
                          echo '<div class="goodsinner">';
                              echo '<img src="' . $row["photoPath"] . '">';
                              echo '<h4>' . $row["name"] . '</h4>';
                              echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';
                              echo '<form action="lib/add_to_cart.php" method="post">';
                              echo '<input type="hidden" name="product_id" value="' . $row["id"] . '">';
                              echo "<input type='hidden' name='quantity' value='1'>";
                              echo '<input type="submit" value="Добавить в корзину" class="button_info_2">';
                              echo "<input type='submit' value='в корзину' class='button_info_mobile'>";
                              echo '</form>';
                          echo '</div>';
                      echo '</div>';
                  }
              } else {
                  echo "Товары не найдены.";
              }
            ?>
          </div>
        </div>
      </section>

      <section class="part">
        <h2 class="name_block">Новинки</h2>
        <div class="part_2nd">
          <div class="row_in">
              <?php
                        include 'lib\db_connect.php';
                        $query = "SELECT * FROM products WHERE id IN ('285', '505', '475', '219')";
                        $result = mysqli_query($link, $query);
                        if (mysqli_num_rows($result) > 0) {
                            $index = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<div class="goods">';
                                echo '<div class="goodsinner">';
                                echo '<img src="' . $row["photoPath"] . '">';
                                echo '<h4>' . $row["name"] . '</h4>';
                                echo '<p>Цена: ' . $row["price"] . ' &#8381;</p>';
                                echo "<form action='/lib/add_to_cart.php' method='post'>";
                                echo "<input type='hidden' name='product_id' value='" . $row["id"] . "'>"; 
                                echo "<input type='hidden' name='quantity' value='1'>"; 
                                echo "<input type='submit' value='Добавить в корзину' class='button_info_2'>";
                                echo "<input type='submit' value='в корзину' class='button_info_mobile'>";
                                echo "</form>";
                                echo '</div>';
                                echo '</div>';
                            }
                        } else {
                            echo "Товары не найдены.";
                        }
                    ?>
          </div>
        </div>
      </section>
      <section class="part">
        <div class="row_ins">
          <div>
            <img class="row_img" src="img/kitty.png" alt="">
          </div>
          <div id="about_flex">
            <h2 id="name_block_diff">Кратко о нас</h2>
            <p>В нашем магазине Вы найдете широкий выбор кормов, игрушек, одежды и аксессуаров для собак, кошек, грызунов, рыбок, птиц и других домашних животных. </p>
            <p>Все товары, представленные у нас, отличаются высоким качеством и соответствуют современным стандартам безопасности.</p>
            <button class="button_info_3" onclick="location.href='about.php'">О компании</button>
          </div>
        </div>
      </section>
      <section class="part">
        <h2 class="name_block">Почему выбирают наш магазин?</h2>
        <div id="why_flex">
          <div id="top_block">
            <div class="left_align">
              <h3>Большой выбор товаров: </h3>
              <p>у нас Вы найдете все необходимое для своего питомца в одном месте.</p>
            </div>
            <div class="right_align">
              <h3>Доступные цены для клиентов: </h3>
              <p>мы стараемся держать цены на наши товары на уровне, доступном для всех наших клиентов.</p>
            </div>
          </div>
          <div id="bottom_block">
            <div class="left_align">
              <h3>Высокое качество товаров: </h3>
              <p>мы работаем только с проверенными поставщиками, которые гарантируют качество и безопасность всех товаров.</p>
            </div>
            <div class="right_align">
              <h3>Профессиональные консультации:</h3>
              <p>наши менеджеры всегда готовы помочь в выборе товара и ответить на все Ваши вопросы.</p>
            </div>
          </div>
        </div>
      </section>
    </main>
    <?php include 'lib\footer.php'; ?>
    <script src="js/toggle-burger.js"></script>
  </body>
</html>