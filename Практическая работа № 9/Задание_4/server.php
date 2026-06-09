<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных в строке запроса</h1>
	<h2>Информация полученная из строки запроса</h2>
	
	<?php
		// информация строки запроса	
		// Выводим полученные данные в браузер в читаемом виде
		if (!empty($_GET)) {
			echo "Идентификатор альбома: "  . htmlspecialchars($_GET['id'] ?? '')          . "<br>";
			echo "Название альбома: "       . htmlspecialchars($_GET['album_name'] ?? '')  . "<br>";
			echo "Дата выпуска: "           . htmlspecialchars($_GET['date'] ?? '')        . "<br>";
			echo "Лейбл студии: "           . htmlspecialchars($_GET['label'] ?? '')       . "<br>";
			echo "Формат: "                 . htmlspecialchars($_GET['format'] ?? '')      . "<br>";
			echo "Статус: "                 . htmlspecialchars($_GET['status'] ?? '')      . "<br>";
		} else {
			echo "Параметры в строке запроса не переданы.";
		}
	?>
	

</body>
</html>
