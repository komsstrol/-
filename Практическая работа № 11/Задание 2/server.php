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
		// массивы ошибок — отдельный учёт по типам
		$_ERROR["valid"] = [];
		$_ERROR["empty"] = [];

		// проверяем поле Логин
		if (!empty($_POST['login'])) {
			$login = htmlspecialchars(trim($_POST['login']));
			if (!preg_match('/^[a-z0-9]{5,10}$/u', $login)) {
				$_ERROR["valid"][] = "$login - невалидный логин";
			}
		} else {
			$_ERROR["empty"][] = "Не заполнено поле Логин";
		}

		// проверяем поле E-mail
		if (!empty($_POST['email'])) {
			$email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$_ERROR["valid"][] = "$email - невалидный адрес";
			}
		} else {
			$_ERROR["empty"][] = "Не заполнено поле E-mail";
		}

		// проверяем поле Пароль
		if (!empty($_POST['pwd'])) {
			$pwd = htmlspecialchars(trim($_POST['pwd']));
			if (!preg_match('/^[a-zA-Z0-9]{8,}$/', $pwd)) {
				$_ERROR["valid"][] = "$pwd - невалидный пароль";
			}
		} else {
			$_ERROR["empty"][] = "Не заполнено поле Пароль";
		}

		// вывод результата
		if (empty($_ERROR["valid"]) && empty($_ERROR["empty"])) {
			echo "<h3>Форма успешно отправлена</h3>";
		} else {
			// блок пустых значений
			if (!empty($_ERROR["empty"])) {
				echo "<h3>Пустые значения</h3>";
				foreach ($_ERROR["empty"] as $msg) {
					echo "<p>$msg</p>";
				}
			}
			// блок невалидных значений
			if (!empty($_ERROR["valid"])) {
				echo "<h3>Невалидные значения</h3>";
				foreach ($_ERROR["valid"] as $msg) {
					echo "<p>$msg</p>";
				}
			}
		}
	?>	


</body>
</html>
