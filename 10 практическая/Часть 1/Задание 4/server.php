<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Обработчик формы</h1>

	<?php
		// смотрим, как пользователь хочет видеть данные
		$view = isset($_GET['view']) ? $_GET['view'] : 'dump';

		if ($view == 'dump') {
			// view=dump — выводим как объект PHP
			echo "<h3>Данные формы в виде объекта PHP</h3>";
			echo "<pre>";
			print_r($_POST);
			echo "</pre>";
		} elseif ($view == 'json') {
			// view=json — выводим как объект JSON
			echo "<h3>Данные формы в виде объекта JSON</h3>";
			echo "<pre>";
			echo json_encode($_POST, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
			echo "</pre>";
		} else {
			echo "<p>Неизвестный параметр view. Допустимые значения: <b>dump</b>, <b>json</b>.</p>";
		}
	?>

</body>
</html>
