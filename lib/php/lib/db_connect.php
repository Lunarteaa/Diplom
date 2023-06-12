<?php
// параметры подключения к базе данных
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'purrfectpets';

// подключение к базе данных
$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
?>