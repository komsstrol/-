<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	<h1>Отправка данных на сервер</h1>
	<h2>Безопасность данных, часть 2</h2>

	<?php
		$_ERROR = [];

		// проверяем поле логин
		if (!empty($_POST['login'])) {
			// санитизация с помощью filter_var
			// FILTER_SANITIZE_FULL_SPECIAL_CHARS экранирует спецсимволы,
			// в связке с trim() очищает строку от лишних пробелов
			$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

			// валидация по правилу [a-z0-9]{5,10}
			if (!preg_match('/^[a-z0-9]{5,10}$/', $login)) {
				$_ERROR[] = "Логин \"$login\" не соответствует правилу: [a-z0-9]{5,10}";
			}
		} else {
			$_ERROR[] = "Не заполнено поле Логин";
		}

		// вывод результата
		if (empty($_ERROR)) {
			echo "<h3>Логин \"$login\" принят</h3>";
		} else {
			echo "<h3>В процессе проверки логина возникли ошибки:</h3>";
			foreach ($_ERROR as $msg) {
				echo "<p>$msg</p>";
			}
		}
	?>
	

</body>
</html>
