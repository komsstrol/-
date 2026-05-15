<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 5 - Альбомы</title>
</head>
<body>
    <h1>Альбомы</h1>
    <hr>

    <?php
    // Подключаем массив из отдельного файла
    require_once '/var/www/html/Практическая работа № 4/Задание_10/review-2.php';
    ?>

    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Альбом</th>
            <th>Дата выпуска</th>
            <th>Страна</th>
            <th>Идентификатор группы</th>
        </tr>
        <?php foreach ($album as $item): ?>
        <tr>
            <td><?php echo $item['id_album']; ?></td>
            <td><?php echo $item['title']; ?></td>
            <td><?php echo $item['date']; ?></td>
            <td><?php echo $item['country']; ?></td>
            <td><?php echo $item['id_team']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>