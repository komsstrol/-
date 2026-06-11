<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h2>Регистрация. Страница 3</h2>

	<form action="server.php" method="post">

		<?php
			// все данные предыдущих шагов сохраняем в скрытых полях
			foreach ($_POST as $key => $value) {
				echo "<input type='hidden' name='$key' value='$value'>";
			}
		?>

		<input type="submit" value="Завершить регистрацию">
	</form>

omsk
</body>
</html>
