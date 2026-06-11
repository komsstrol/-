<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>
	<h2>Безопасность данных, часть 2</h2>
	<hr>
	<h2>Загрузка файлов</h2>

	<?php
		$_ERROR = [];

		// разрешённые типы графических файлов
		define('ALLOW_IMAGE_EXT', array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP));

		// проверяем загрузку на наличие ошибок
		if (!isset($_FILES['myfile']) || $_FILES['myfile']['error'] != UPLOAD_ERR_OK) {
			$_ERROR[] = "Файл не загружен или загружен с ошибкой";
		} else {
			// определяем тип переданного файла
			$image_type = exif_imagetype($_FILES['myfile']['tmp_name']);

			// файл должен быть изображением
			if ($image_type === false) {
				$_ERROR[] = "Загружаемый файл не является изображением";
			} elseif (!in_array($image_type, ALLOW_IMAGE_EXT)) {
				// тип файла должен быть в списке разрешённых
				$_ERROR[] = "Тип загружаемого изображения не относится к разрешенным (JPEG, PNG, BMP)";
			}
		}

		// вывод результата проверки
		if (empty($_ERROR)) {
			echo "<h3>Файл успешно прошёл проверку</h3>";
		} else {
			echo "<h3>В процессе проверки возникли ошибки:</h3>";
			foreach ($_ERROR as $msg) {
				echo "<p>$msg</p>";
			}
		}
	?>


</body>
</html>
