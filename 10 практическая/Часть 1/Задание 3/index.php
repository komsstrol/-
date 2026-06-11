<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Отправка данных на сервер</h1>
	<h2>Еще о формах</h2>
	<hr>
	<h2>Оформление заказа</h2>
	
	<?php
		// подключаем файл с индексным массивом заказов
		require "orders.php";

		// весь индексный массив заказов преобразуем в JSON-строку
		$json = json_encode($orders, JSON_UNESCAPED_UNICODE);
	?>

	<form action="server.php" method="post">
		Фамилия: <input type="text" name="surname"><p>
		Имя: <input type="text" name="name"><p>
		E-mail: <input type="email" name="email"><p>

		<!-- JSON-строку записываем в одно скрытое поле -->
		<input type="hidden" name="orders" value='<?= $json ?>'>

		<input type="submit">
	</form>

omsk
</body>
</html>
