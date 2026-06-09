<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>JSON формат</h1>
	<h2>Исправление JSON-представления</h2>

	<?php

		// Исправленное JSON-представление
		$json = '{
			"name": "Harry Potter and the Goblet of Fire",
			"author": "J. K. Rowling",
			"year": 2000,
			"genre": "Fantasy Fiction",
			"bestseller": true
		}';

		echo "<h3>Исправленная строка JSON:</h3>";
		echo "<pre>" . htmlspecialchars($json) . "</pre>";

		// Декодируем строку JSON в ассоциативный массив (второй параметр - true)
		$decoded = json_decode($json, true);

		echo "<h3>Результат декодирования (ассоциативный массив):</h3>";
		echo "<pre>";
		print_r($decoded);
		echo "</pre>";

		// Проверка успешности декодирования
		if (json_last_error() === JSON_ERROR_NONE) {
			echo "<p>JSON успешно декодирован.</p>";
		} else {
			echo "<p>Ошибка декодирования: " . json_last_error_msg() . "</p>";
		}
	?>

</body>
</html>
