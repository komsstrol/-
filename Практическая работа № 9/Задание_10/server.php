<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>JSON формат</h1>
	<h2>Информация, полученная из строки JSON GET-параметра</h2>

	<?php
		// 4. На сервере принимаем и декодируем полученные данные
		if (isset($_GET["data"])) {

			// Получаем JSON-строку из GET-параметра
			$json = $_GET["data"];

			// Декодируем JSON-строку в ассоциативный массив PHP (второй параметр true)
			$educations = json_decode($json, true);

			// 5. Выводим результат работы условного сервера в браузер
			echo "<pre>";
			var_dump($educations);
			echo "</pre>";
		} else {
			echo "Данные не переданы в строке запроса.";
		}
	?>

</body>
</html>
