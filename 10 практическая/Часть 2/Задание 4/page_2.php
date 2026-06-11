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
	<h2>Регистрация. Страница 2</h2>

	<form action="page_3.php" method="post">

		<?php
			// данные предыдущего шага сохраняем в скрытых полях
			foreach ($_POST as $key => $value) {
				echo "<input type='hidden' name='$key' value='$value'>";
			}
		?>

	 	Должность: <input type="text" name="post"><p>
		Категория: <input type="text" name="category"><p>
		Стаж: <input type="text" name="experience"><p>	
		
		<input type="submit">
	</form>

omsk
</body>
</html>
