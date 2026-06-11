<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Обработчик формы</h1>
	<h3>Сервер получил следующие данные</h3>

	<?php
		// Преобразуем с помощью цикла данные формы в JSON-формат
		$pairs = [];
		foreach ($_POST as $key => $value) {
			$pairs[] = '"' . $key . '" : "' . $value . '"';
		}
		$json = "{ " . implode(", ", $pairs) . " }";
	?>

	<h3>JSON строка</h3>
	<p><?= $json ?></p>

	<?php
		// Декодируем JSON-представление данных формы в массив PHP
		$arr = json_decode($json, true);
	?>

	<h3>PHP массив</h3>
	<pre><?php print_r($arr); ?></pre>

</body>
</html>
