<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Обработчик формы</h1>

	<h3>Мы сформировали список ваших предпочтений и готовы начать поиск!</h3>

	<?php
		// убираем из критериев поиска имя пользователя — оно не критерий
		$criteria = $_POST;
		unset($criteria['name']);

		// преобразуем критерии в JSON
		$json = json_encode($criteria, JSON_UNESCAPED_UNICODE);

		// прикрепляем строку JSON к атрибуту href в виде строки запроса
		$href = "db.php?search=" . urlencode($json);
	?>

	<p><img src="img.jpg" alt="Поиск"></p>

	<a href="<?= $href ?>">Начать поиск</a>

</body>
</html>
