<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 4 - Группы</title>
</head>
<body>
    <h1>Группы</h1>
    <hr>

    <?php
    // Подключаем массив из отдельного файла
    require_once '/var/www/html/Практическая работа № 4/Задание_10/review-1.php';
    
    // Вывод данных массива
    foreach ($team as $item) {
        echo "Группа: {$item['name']} (id = {$item['id_team']})<br/>";
        echo "Страна: {$item['country']}<br/>";
        echo "Дата основания: {$item['date']}<br/>";
        echo "Стиль: {$item['style']}<br/>";
        echo "<hr/>";
    }
    ?>
</body>
</html>