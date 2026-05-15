<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 3: Корни квадратного уравнения</title>
</head>
<body>
    <h2>Решение квадратного уравнения ax² + bx + c = 0</h2>

    <form method="POST">
        <label>a: <input type="number" name="a" step="any" required></label><br><br>
        <label>b: <input type="number" name="b" step="any" required></label><br><br>
        <label>c: <input type="number" name="c" step="any" required></label><br><br>
        <button type="submit">Рассчитать</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $a = (float)$_POST['a'];
        $b = (float)$_POST['b'];
        $c = (float)$_POST['c'];

        // Находим дискриминант
        $d = $b * $b - 4 * $a * $c;

        if ($d > 0) {
            $x1 = (-$b + sqrt($d)) / (2 * $a);
            $x2 = (-$b - sqrt($d)) / (2 * $a);
            echo "x1 = $x1<br>";
            echo "x2 = $x2";
        } elseif ($d < 0) {
            echo "Нет корней";
        } elseif ($d == 0) {
            $x = (-$b + sqrt($d)) / (2 * $a);
            echo "x = $x";
        }
    }
    ?>
</body>
</html>