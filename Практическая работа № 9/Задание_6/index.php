<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>JSON формат</h1>
	<h2>Декодирование JSON объекта в ассоциативный массив</h2>

	<?php
		// подключаем исходный одномерный ассоциативный PHP массив
		require "array.php";


		// Вручную сформированная строка JSON (JSON объект - фигурные скобки, ключи в двойных кавычках)
		$json = '{
			"name": "Мастер и Маргарита",
			"author": "М.Булгаков",
			"year": 1940,
			"genre": "Мистика",
			"bestseller": true
		}';

		echo "<h3>Строка JSON:</h3>";
		echo "<pre>" . htmlspecialchars($json) . "</pre>";

		// Декодируем строку JSON в ассоциативный массив
		// Второй параметр true указывает, что результат - ассоциативный массив, а не объект stdClass
		$decoded = json_decode($json, true);

		echo "<h3>Результат декодирования (ассоциативный массив):</h3>";
		echo "<pre>";
		var_dump($decoded);
		echo "</pre>";

	?>

</body>
</html>
