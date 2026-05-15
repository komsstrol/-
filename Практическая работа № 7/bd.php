<?php

$servername = "localhost"; 
$username = "root";         
$password = "12345678";     
$dbname = "user";           

// Создаем подключение с использованием MySQLi
$connect = new mysqli($servername, $username, $password, $dbname);

// Проверяем успешность подключения
if ($connect->connect_error) {
    // Если подключение не удалось - выдаем ошибку
    die("Ошибка подключения к базе данных: " . $connect->connect_error);
}

// Устанавливаем кодировку UTF-8 для корректной работы с русскими символами
$connect->set_charset("utf8mb4");


?>