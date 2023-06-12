<?php

$link = mysqli_connect('127.127.126.26', 'root', '1234', 'purrfectpets');
if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
}

$query = 'CREATE TABLE IF NOT EXISTS products(
    id BIGINT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    description TEXT,
    photoPath VARCHAR(255) NOT NULL,
    price DECIMAL(6,2) NOT NULL,
    section_id BIGINT NOT NULL,
    PRIMARY KEY (id),
    FOREIGN KEY (section_id)  REFERENCES sections (id)
)';

if($link->query($query) === TRUE) {
    echo 'Таблица products создана успешно';
}else{
    echo 'Ошибка при создании таблицы: ' . $link->error;
}
