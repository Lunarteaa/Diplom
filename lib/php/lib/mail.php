<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получение данных из формы
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $feedback = $_POST['feedback'];

    // Формирование заголовков письма
    $to = "purfectinfo@gmail.com";
    $subject = 'Новый запрос от пользователя';
    $headers = "From: $name <$to>\r\n";
    $headers .= "Reply-To: $to\r\n";

    // Формирование тела письма
    $body = "Имя: $name\r\n";
    $body .= "Телефон: $phone\r\n";
    $body .= "Сообщение:\r\n$feedback";

    // Отправка письма
    if (mail($to, $subject, $body, $headers)) {
        echo 'Сообщение успешно отправлено';
    } else {
        echo 'Ошибка при отправке сообщения';
    }
}
?>