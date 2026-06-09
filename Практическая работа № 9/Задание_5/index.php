<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>JSON формат</h1>
	<h2>Декодирование JSON массива</h2>

	<?php
		// подключаем исходный одномерный индексный PHP массив
		require "array.php";


		// Вручную сформированная строка JSON в виде JSON массива (квадратные скобки)
		$json = '["Мастер и Маргарита", "М.Булгаков", 1940, "Мистика", true]';

		echo "<h3>Строка JSON:</h3>";
		echo "<pre>" . htmlspecialchars($json) . "</pre>";

		$decoded = json_decode($json);

		echo "<h3>Результат декодирования:</h3>";
		echo "<pre>";
		var_dump($decoded);
		echo "</pre>";

		// Успешное декодирование (не null) подтверждает,
		// что строка JSON-представления массива записана верно.
	?>

</body>
</html>
