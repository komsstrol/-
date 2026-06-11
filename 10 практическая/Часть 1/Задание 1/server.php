<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Обработчик формы</h1>
	<h3>Сервер получил следующие данные</h3>

	<?php
		// подписи для каждого поля формы
		$labels = [
			'surname'         => 'Фамилия',
			'name'            => 'Имя',
			'patronymic'      => 'Отчество',
			'post'            => 'Должность',
			'education'       => 'Уровень образования',
			'category'        => 'Категория',
			'experience'      => 'Общий стаж',
			'experience_local'=> 'Стаж в техникуме'
		];

		// выводим данные формы в браузер
		foreach ($_POST as $key => $value) {
			$label = $labels[$key] ?? $key;
			echo "<p>$label: $value</p>";
		}
	?>

</body>
</html>
