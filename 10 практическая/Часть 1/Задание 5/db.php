<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Модуль поиска информации, согласно пришедшего критерия</h1>

	<?php
		// декодируем принятый JSON из строки запроса
		$criteria = json_decode($_GET['search'], true);

		// выводим полученные данные в виде переменной PHP
		echo "<pre>";
		var_dump($criteria);
		echo "</pre>";
	?>

</body>
</html>
