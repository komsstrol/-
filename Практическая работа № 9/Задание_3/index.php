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
		$educations = array (
			array (
			'id' => 5, 
			'institution' => 'Московский государственный институт электронной техники (технический университет) ', 
			'qualification' => 'Факультет инфокоммуникационных технологий', 
			'specialty' => 'Программное обеспечение радиоэлектронных систем', 
			'year_receipts' => 2005, 
			'year_release' => 2010, 
			'note' => ''
			),
			array (
			'id' => 12, 
			'institution' => 'Санкт-Петербургский государственный университет (СПбГУ)', 
			'qualification' => 'Информационные системы и технологии', 
			'specialty' => 'Безопасность киберфизических систем', 
			'year_receipts' => 1993, 
			'year_release' => 1998, 
			'note' => ''		
			)
		);

		// Преобразуем массив в строку запроса с помощью http_build_query
		// При этом получим строку вида:
		// educations[0][id]=5&educations[0][institution]=...&educations[1][id]=12&...
		$queryString = http_build_query(["educations" => $educations]);

		// Формируем ссылку для передачи данных на условный сервер
		echo "<a href='server.php?{$queryString}'>Передать данные о педагоге на сервер</a>";
	?>


</body>
</html>
