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
		$_ERROR = []; // массив ошибок

		// проверяем поле логин на валидность 
		if (!empty($_POST['login'])) {
			// очищаем данные через filter_var
			$login = filter_var(trim($_POST['login']), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
			// валидация: [a-z0-9]{5,10}
			if (!preg_match('/^[a-z0-9]{5,10}$/', $login)) {
				$_ERROR[] = "Логин \"$login\" не соответствует правилу: [a-z0-9]{5,10}";
			}
		} else {
			$_ERROR[] = "Не заполнено поле Логин";
		}

		// проверяем загрузку на наличие ошибок
		if (!isset($_FILES['myfile']) || $_FILES['myfile']['error'] != UPLOAD_ERR_OK) {
			switch ($_FILES['myfile']['error'] ?? UPLOAD_ERR_NO_FILE) {
				case UPLOAD_ERR_INI_SIZE:
					$_ERROR[] = "Размер принятого файла превысил upload_max_filesize (код 1)";
					break;
				case UPLOAD_ERR_FORM_SIZE:
					$_ERROR[] = "Размер файла превысил MAX_FILE_SIZE (код 2)";
					break;
				case UPLOAD_ERR_PARTIAL:
					$_ERROR[] = "Файл был получен только частично (код 3)";
					break;
				case UPLOAD_ERR_NO_FILE:
					$_ERROR[] = "Файл не был загружен (код 4)";
					break;
				default:
					$_ERROR[] = "Ошибка при загрузке файла";
			}
		}

		// если массив ошибок пуст, проверяем, относится ли файл к разрешенным для загрузки
		if (empty($_ERROR)) {
			// разрешенные форматы графических файлов
			define('ALLOW_IMAGE_EXT', array(IMAGETYPE_JPEG, IMAGETYPE_PNG, IMAGETYPE_BMP));

			if (!in_array(exif_imagetype($_FILES["myfile"]["tmp_name"]), ALLOW_IMAGE_EXT)) {
				$_ERROR[] = "Загружаемый файл не относится к разрешенным типам (JPEG, PNG, BMP)";
			}
		}
		
		// если массив ошибок пуст, пытаемся переместить файл в директорию upload
		if (empty($_ERROR)) {
			$current_path = $_FILES['myfile']['tmp_name'];
			$filename = $_FILES['myfile']['name'];
			$new_path = __DIR__ . '/upload/' . $filename;

			if (move_uploaded_file($current_path, $new_path)) {
				echo "<h3>Файл изображения успешно загружен на сервер</h3>";
				echo "<img src='upload/$filename' width='250px'>";
			} else {
				echo "<h3>Не удалось переместить файл в директорию хранения</h3>";
			}
		} else {
			echo "<h3>В процессе загрузки возникли ошибки:</h3>";
			foreach ($_ERROR as $msg) {
				echo "<p>$msg</p>";
			}
		}
	?>


</body>
</html>
