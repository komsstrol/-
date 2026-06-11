<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>
	<h2>Безопасность данных, часть 1</h2>
	
	<?php
		// массив ошибок
		$_ERROR = [];

		// проверяем поле Логин 
		if (!empty($_POST['login'])) {
			// санитизация — удаляем пробелы и спецсимволы HTML
			$login = htmlspecialchars(trim($_POST['login']));
			// валидация — буквы (a-z), цифры, 5-10 символов
			if (!preg_match('/^[a-z0-9]{5,10}$/u', $login)) {
				$_ERROR[] = "$login - невалидный логин";
			}
		} else {
			$_ERROR[] = "Не заполнено поле Логин";
		}

		// проверяем поле E-mail 
		if (!empty($_POST['email'])) {
			// санитизация e-mail встроенным фильтром
			$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
			// валидация e-mail
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$_ERROR[] = "$email - невалидный адрес";
			}
		} else {
			$_ERROR[] = "Не заполнено поле E-mail";
		}

		// проверяем поле Пароль
		if (!empty($_POST['pwd'])) {
			// санитизация
			$pwd = htmlspecialchars(trim($_POST['pwd']));
			// валидация — буквы и цифры, не менее 8 символов
			if (!preg_match('/^[a-zA-Z0-9]{8,}$/', $pwd)) {
				$_ERROR[] = "$pwd - невалидный пароль";
			}
		} else {
			$_ERROR[] = "Не заполнено поле Пароль";
		}

		// вывод результата
		if (empty($_ERROR)) {
			echo "<h3>Форма успешно отправлена</h3>";
		} else {
			echo "<pre>";
			var_dump($_ERROR);
			echo "</pre>";
		}
	?>	
	

</body>
</html>
