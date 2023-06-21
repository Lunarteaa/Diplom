<?php

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'purrfectpets';


$link = mysqli_connect($host, $user, $password, $database);
if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
}
?>