<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>JSON формат</h1>
	<h2>Декодирование JSON в массив объектов</h2>

	<?php
		// Подключаем файл team.txt
		// В файле объявлена переменная $team, содержащая JSON-строку
		require "team.txt";
		$teams = json_decode($team);

		// ыводим результат декодирования в браузер
		echo "<pre>";
		var_dump($teams);
		echo "</pre>";

		// вывод данных каждой группы
		echo "<hr><h2>Список групп:</h2>";
		foreach ($teams as $item) {
			echo "<h3>" . htmlspecialchars($item->name) . " (" . htmlspecialchars($item->country) . ")</h3>";
			echo "<p>Год образования: " . htmlspecialchars($item->date) . "<br>";
			echo "Стиль: " . htmlspecialchars($item->style) . "</p>";
			echo "<p>" . htmlspecialchars($item->content) . "</p>";
		}
	?>

</body>
</html>
