<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>
	<h2>Отправка данных в строке запроса</h2>
	
	<?php
		// исходный двумерный массив
		$array = [
			[
			"id"=>"1",
			"album_name"=>"Atom Heart Mother",
			"date"=>"10 октября 1970", 
			"label" =>"EMI, Harvest, Capitol",
			"status"=>"Золотой (USA)"
			],
			[
			"id"=>"2",
			"album_name"=>"Meddle",
			"date"=>"30 октября 1971",
			"label"=>"EMI, Harvest, Capitol",
			"status"=>"Платиновый (USA)"
			]
		];

		echo "<h2>Исходный массив</h2>";
		// исходный массив
		echo "<pre>";
		print_r ($array);
		echo "</pre>";

		// ?data=
		// Вручную преобразуем двумерный массив в формат для передачи в строке запроса.
		// Для двумерного массива в строке запроса используется синтаксис:
		// data[0][id]=1&data[0][album_name]=Atom+Heart+Mother&...&data[1][id]=2&...
		//
		// Имитируем приход данных через строку запроса, задав $_GET["data"] напрямую
		// со структурой, идентичной исходной.
		$_GET["data"] = [
			[
				"id"          => "1",
				"album_name"  => "Atom Heart Mother",
				"date"        => "10 октября 1970",
				"label"       => "EMI, Harvest, Capitol",
				"status"      => "Золотой (USA)"
			],
			[
				"id"          => "2",
				"album_name"  => "Meddle",
				"date"        => "30 октября 1971",
				"label"       => "EMI, Harvest, Capitol",
				"status"      => "Платиновый (USA)"
			]
		];

		// Строка запроса, к которой приведён массив (для наглядности):
		$queryString = http_build_query(["data" => $array]);
		echo "<h2>Строка запроса (сформированная вручную из массива)</h2>";
		echo "<pre>" . htmlspecialchars($queryString) . "</pre>";

		echo "<h2>Массив из строки запроса </h2>";
		// сформированный массив (полученный из строки запроса)
		echo "<pre>";
		print_r ($_GET["data"]);
		echo "</pre>";
	?>
	

</body>
</html>
