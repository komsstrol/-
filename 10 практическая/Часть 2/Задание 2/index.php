<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Отправка данных на сервер</h1>
	<h2>Еще о формах</h2>
	
	<?php
		// подключаем файл с массивом заказа
		include "orders.php";

		// блок вывода скрытых полей заказа
		$order = "";
		foreach ($orders as $item) {
			// каждый заказ массива переводим в JSON-представление
			$json = json_encode($item, JSON_UNESCAPED_UNICODE);
			$order .= "<input type='hidden' name='order[]' value='$json'><p>";
		}
	?>
	
	<form action="server.php" method="post">
		Фамилия: <input type="text" name="surname"><p>
		Имя: <input type="text" name="name"><p>
		E-mail: <input type="email" name="email"><p>
		
		<!-- блок вывода скрытых полей заказа -->
		<?= $order ?>

		<input type="submit">
	</form>

omsk
</body>
</html>
