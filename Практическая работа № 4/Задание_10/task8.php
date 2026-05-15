<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 8 - Четыре цикла</title>
</head>
<body>

    <?php
    // Подключаем массив из отдельного файла
    require_once '/var/www/html/Практическая работа № 4/Задание_10/review-3.php';
    ?>

    <h2>1. Цикл do-while (маркированный список)</h2>
    <ul>
        <?php
        $i = 0;
        do {
            echo "<li>(" . $track[$i]['id_track'] . ") " . $track[$i]['name'] . "</li>";
            $i++;
        } while ($i < count($track));
        ?>
    </ul>

    <h2>2. Цикл for (нумерованный список)</h2>
    <ol>
        <?php
        for ($i = 0; $i < count($track); $i++) {
            echo "<li>(" . $track[$i]['id_track'] . ") " . $track[$i]['name'] . " (id альбома: " . $track[$i]['id_album'] . ")</li>";
        }
        ?>
    </ol>

    <h2>3. Цикл foreach (табличное представление)</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>id</th>
            <th>Трек</th>
            <th>Примечание</th>
            <th>Id-альбома</th>
        </tr>
        <?php foreach ($track as $item): ?>
        <tr>
            <td><?php echo $item['id_track']; ?></td>
            <td><?php echo $item['name']; ?></td>
            <td><?php echo $item['note']; ?></td>
            <td><?php echo $item['id_album']; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>

    <h2>4. Цикл while (табличное представление)</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>id</th>
            <th>Трек</th>
            <th>Примечание</th>
            <th>Id-альбома</th>
        </tr>
        <?php
        $i = 0;
        while ($i < count($track)) {
            echo "<tr>";
            echo "<td>" . $track[$i]['id_track'] . "</td>";
            echo "<td>" . $track[$i]['name'] . "</td>";
            echo "<td>" . $track[$i]['note'] . "</td>";
            echo "<td>" . $track[$i]['id_album'] . "</td>";
            echo "</tr>";
            $i++;
        }
        ?>
    </table>

</body>
</html>