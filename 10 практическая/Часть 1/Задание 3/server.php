<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Оформление заказа</h1>
	
	<?php
		// данные о заказчике
		$customer = array(
			'surname' => $_POST['surname'],
			'name'    => $_POST['name'],
			'email'   => $_POST['email']
		);

		// декодируем JSON-строку заказов обратно в массив
		$orders = json_decode($_POST['orders'], true);
	?>

	<h3>Данные о заказчике:</h3>
	<pre><?php print_r($customer); ?></pre>

	<h3>Данные заказа принятые обработчиком формы:</h3>
	<pre><?php print_r($orders); ?></pre>

</body>
</html>
