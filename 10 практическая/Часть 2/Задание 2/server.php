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
		// выводим данные глобального массива POST

		// данные о заказчике
		$customer = array(
			'surname' => $_POST['surname'],
			'name'    => $_POST['name'],
			'email'   => $_POST['email']
		);
	?>

	<h3>Данные о заказчике:</h3>
	<pre><?php print_r($customer); ?></pre>

	<h3>Данные заказа принятые обработчиком формы:</h3>
	<pre><?php print_r($_POST['order']); ?></pre>

	<!--
		Подумайте, какой тип данных выведет инструкция:
		print_r ($_POST["order"][1]);

		Ответ: строку (string) — JSON-представление второго заказа,
		т.к. каждый элемент массива order — это строка JSON.
	-->

omsk
</body>
</html>
