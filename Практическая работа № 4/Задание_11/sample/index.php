<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Программирование на языке PHP</title>
</head>
<body>
    <h1>Управляющие конструкции</h1>
    <h2>Конструкции</h2>

    <?php
 
    require_once 'personnels.php';

    $term = "surname";
    $value = "Маркова";


    foreach ($content as $item) {
        if ($item[$term] == $value) {
            echo "id: " . $item['id_personnel'] . " <br />";
            echo "Фамилия: " . $item['surname'] . " <br />";
            echo "Имя: " . $item['name'] . " <br />";
            echo "Отчество: " . $item['patronymic'] . " <br />";
            echo "Должность: " . $item['post'] . " <br />";
            echo "Категория: " . $item['category'] . " <br />";
            echo "Образование: " . $item['level_edu'] . " <br />";
            echo "Стаж работы в ОУ: " . $item['experience_total'];
            break; 
        }
    }
    ?>

</body>
</html>