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
	<h2>Редактируем данные пользователя</h2>

	<?php
		require "user.php";

		// строки lang и interes хранятся как строки через запятую — превратим в массивы
		$userLang    = array_map('trim', explode(',', $user['lang']));
		$userInteres = array_map('trim', explode(',', $user['interes']));

		// массив всех возможных курсов (value => подпись)
		$courses = [
			'java'       => 'Разработчик игр на Java',
			'php'        => 'Программирование на PHP',
			'python'     => 'Занимательный Python',
			'perl'       => 'Язык программирования Perl за 24 часа',
			'javascript' => 'Javascript в примерах'
		];

		// массив возможных форм обучения
		$forms = ['очное', 'очно-заочное', 'заочное', 'дистанционное'];

		// массив направлений ИТ
		$interests = [
			'Веб и интернет-технологии',
			'Разработка программ для компьютеров и смартфонов',
			'Программирование роботов и умных устройств',
			'Искусственный интеллект и машинное обучение',
			'Инфраструктура — сети, серверы, администрирование'
		];
	?>

	<form action="example_8.php" method="post">
		Имя: <input type="text" name="name" value="<?= $user['name'] ?>"><p>
		E-mail: <input type="email" name="email" value="<?= $user['email'] ?>"><p>
	
		<h3>Выберите интересующий вас курс:</h3>
		<?php
			// выводим список курсов, отмечаем те, что есть в данных пользователя
			foreach ($courses as $value => $label) {
				$checked = in_array($value, $userLang) ? 'checked' : '';
				echo "<input type='checkbox' name='lang[]' value='$value' $checked /> $label <br />";
			}
		?>
		<p>

		<h3>Выберите форму обучения:</h3>
		<?php
			// выводим радиокнопки, отмечаем выбранную форму обучения
			foreach ($forms as $value) {
				$checked = ($value == $user['form']) ? 'checked' : '';
				echo "<input type='radio' name='form' value='$value' $checked /> $value <br />";
			}
		?>
		<p>

		<h3>Какие направления ИТ вас могли бы заинтересовать:</h3>
		<select name="interes[]" size=5 multiple>
			<?php
				// выводим список направлений, отмечаем выбранные
				foreach ($interests as $value) {
					$selected = in_array($value, $userInteres) ? 'selected' : '';
					echo "<option value='$value' $selected>$value</option>";
				}
			?>
		</select><p>

		<input type="submit" value="Отправить">
	</form>

omsk
</body>
</html>
