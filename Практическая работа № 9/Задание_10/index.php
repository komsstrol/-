<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>JSON формат</h1>
	<h2>Передача данных в JSON-формате через строку запроса</h2>

	<?php
		// Подключаем файл educations.php с массивом $educations
		require "educations.php";

		// Кодируем данные массива $educations в JSON-представление.
		// Флаг JSON_UNESCAPED_UNICODE - чтобы кириллица не превращалась в \uXXXX,
		// а оставалась читаемой в URL.
		$json = json_encode($educations, JSON_UNESCAPED_UNICODE);

		// С помощью ссылки передаём данные на условный сервер.
		// JSON-строку оборачиваем в urlencode, чтобы спецсимволы корректно прошли в URL.
		$queryString = "data=" . urlencode($json);

		echo "<a href='server.php?{$queryString}'>Передать данные об образовании на сервер</a>";
	?>

</body>
</html>
