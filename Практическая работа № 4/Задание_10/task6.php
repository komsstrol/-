<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 6 - Треки</title>
</head>
<body>
    <h1>Просмотр треков сервиса:</h1>

    <?php
    // Подключаем массив из отдельного файла
    require_once '/var/www/html/Практическая работа № 4/Задание_10/review-3.php';
    ?>

    <ol>
        <?php foreach ($track as $item): ?>
            <li>(id=<?php echo $item['id_track']; ?>) <?php echo $item['name']; ?></li>
        <?php endforeach; ?>
    </ol>
</body>
</html>
