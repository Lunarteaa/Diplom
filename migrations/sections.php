<?php

$link = mysqli_connect('127.127.126.26', 'root', '1234', 'purrfectpets');
if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
}

$query = 'CREATE TABLE IF NOT EXISTS sections(
    id BIGINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    code VARCHAR(255) NOT NULL,
    photoPath VARCHAR(255) NOT NULL,
    primary key (id)
)';

if($link->query($query) === TRUE) {
    echo 'Таблица sections создана успешно';
}else{
    echo 'Ошибка при создании таблицы: ' . $link->error;
}
