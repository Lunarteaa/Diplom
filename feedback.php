<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/feedback.css">
    <link rel="stylesheet" href="css/universal.css">
    <title>Document</title>
</head>
<body>
<?php include 'lib\heder.php'; ?>
    <main>
       <section class="part_2nd">
            <h1 id="left_align">Обратная связь</h1>
            <div class="row_in_2nd">
                <div class="semi-block">
                    <h3>У вас есть вопросы или предложения, свяжитесь с нами</h3>
                    <form action="#" method="post">
                        <div class="form_flex">
                            <label for="name">Введите ваше ФИО:</label>
                            <input type="text" id="name" name="name" required class="input_corr_1"><br><br>
                        </div>
                        <div class="form_flex">
                            <label for="phone">Введите ваш номер телефона:</label>
                            <input type="tel" id="phone" name="phone" required class="input_corr_1"><br><br>
                        </div>
                        <div class="form_flex">
                            <label for="feedback">Отправьте нам запрос или предложение:</label><br>
                            <textarea id="feedback" name="feedback" rows="5" cols="30"  class="input_corr_2"></textarea><br><br>
                        </div>
                        <div class="">
                            <input type="checkbox" id="consent" name="consent" required>
                            <label for="consent" class="input_corr_3">Я согласен(на) на обработку персональных данных</label><br><br>    
                        </div>
                        <div class="">
                            <input type="submit" value="Отправить" class="input_corr_4">
                        </div>
                        <?php include 'lib\mail.php'; ?>
                    </form>
                </div>
                <div class="semi-block">
                    <div class="visit_card">
                        <div id="logo_balt">
                            <img src="img/logo.svg" id="scale-pic">
                            <p id="name_b"><span id="letter">P</span>urrfect <span id="letter">P</span>ets</p> 
                        </div>
                        <div id="row_foot_3alt">
                            <img src="img/phone.svg">
                            <p id="footer_p">+7 975 844 34 50</p>
                        </div>
                        <div id="row_foot_3alt">
                            <img src="img/mail.svg">
                            <p id="footer_p">purfectinfo@gmail.com</p>
                        </div>
                        <div id="row_foot_3alt">
                            <img src="img/location.svg">
                            <p id="footer_p">г. Ротсов-на-Дону пр.Буденовский 23</p>
                        </div>
                    </div>
                    <div>
                        <img src="img/Group 31.png" alt="">
                    </div>
                </div>
            </div>
       </section>
    </main>
    <?php include 'lib\footer.php'; ?>
</body>