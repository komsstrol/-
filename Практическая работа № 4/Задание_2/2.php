<?php

function getMemoryResult($lines) {
    switch ($lines) {
        case 2:  return "еда.";
        case 4:  return "Плохо.";
        case 6:  return "ажется, что вы где-то учились";
        case 8:  return "Вы среднестатистический человек.";
        case 10: return "Нормально.";
        case 12: return "Хорошо.";
        case 14: return "Отлично.";
        default: return "Введите 2, 4, 6, 8, 10, 12 или 14.";
    }
}

if (PHP_SAPI === 'cli') {
    if ($argc > 1) {
    
        $lines = (int)$argv[1];
    } else {
    
        echo "Введите количество вспомненных строк: ";
        $input = trim(fgets(STDIN));
        $lines = (int)$input;
    }

    echo "Текст: " . getMemoryResult($lines) . PHP_EOL;
    exit;
}

$result = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['lines'])) {
    $lines = (int)$_POST['lines'];
    $result = getMemoryResult($lines);
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Память на строки Онегина</title>
    <style>
        body { font-family: sans-serif; max-width: 600px; margin: 2rem auto; padding: 1rem; }
        input, button { padding: 0.5rem; font-size: 1rem; margin-top: 0.5rem; }
        .result { margin-top: 1.5rem; font-weight: bold; border-left: 4px solid green; padding-left: 1rem; }
    </style>
</head>
<body>
    <h2>Сколько строк из "Мой дядя самых честных правил…" вы помните?</h2>
    <form method="POST">
        <label>Количество вспомненных строк:</label><br>
        <input type="number" name="lines" step="2" min="2" max="14" required>
        <br>
        <button type="submit">Узнать результат</button>
    </form>

    <?php if ($result !== ''): ?>
        <div class="result">
            Текст: <?= htmlspecialchars($result) ?>
        </div>
    <?php endif; ?>
</body>
</html>