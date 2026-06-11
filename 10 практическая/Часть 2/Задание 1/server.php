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

		// разделяем POST на данные заказчика и данные заказа
		$customer = array(
			'surname' => $_POST['surname'],
			'name'    => $_POST['name'],
			'email'   => $_POST['email']
		);

		$order = $_POST;
		unset($order['surname'], $order['name'], $order['email']);
	?>

	<h3>Данные о заказчике:</h3>
	<pre><?php print_r($customer); ?></pre>

	<h3>Данные заказа принятые обработчиком формы:</h3>
	<pre><?php print_r($order); ?></pre>

omsk
</body>
</html>
