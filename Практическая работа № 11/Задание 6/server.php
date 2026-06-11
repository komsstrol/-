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

		// если поле логина непустое
		if (!empty($_POST['login'])) {
			
			// очищаем данные 	
			$login = htmlspecialchars(trim($_POST['login']));
	        
	        // проверяем данные на валидность
	        if (!preg_match('/^[a-z0-9]{5,10}$/u', $login)) {
				$_ERROR[] = "Логин $login невалиден";
	        } 
		} else {
			$_ERROR[] = "Не заполнено поле Логин";
		}

		// проверяем загрузку на наличие ошибок
		if ($_FILES['myfile']["error"] != UPLOAD_ERR_OK) {
		   // если при загрузке произошла ошибка, запомним информацию о ней
			switch ($_FILES['myfile']['error']) {
		        case UPLOAD_ERR_INI_SIZE:
		            $_ERROR[] = "Размер принятого файла превысил максимально допустимый размер, который задан директивой upload_max_filesize конфигурационного файла php.ini (код ошибки: 1)";
					break;
		        case UPLOAD_ERR_FORM_SIZE:
		        	$_ERROR[] = "Размер загружаемого файла превысил значение MAX_FILE_SIZE, указанное в HTML-форме (код ошибки: 2)";
					break;
		        case UPLOAD_ERR_PARTIAL:
		            $_ERROR[] = "Загружаемый файл был получен только частично (код ошибки: 3)";
					break;
		        case UPLOAD_ERR_NO_FILE:
		        	$_ERROR[] = "Файл не был загружен (код ошибки: 4)";
			}
		} 

		// если массив ошибок пуст проверяем, относится ли файл к разрешенным для загрузки
		if (empty($_ERROR)){
			
			// разрешённые mime-типы для загрузки
			define('ALLOW_MIME_TYPES', array('image/jpeg', 'application/pdf', 'application/zip'));

			// получаем mime-тип загруженного файла
			$finfo = finfo_open(FILEINFO_MIME_TYPE);
			$mime  = finfo_file($finfo, $_FILES['myfile']['tmp_name']);
			finfo_close($finfo);

			// проверка, действительно ли отправляемый файл относится к разрешенным типам
			if (!in_array($mime, ALLOW_MIME_TYPES)) {
				$_ERROR[] = "Загружаемый файл (mime: $mime) не относится к разрешенным типам";
			}			
		}
		
		// если массив ошибок пуст пытаемся переместить файл в директорию upload
		if (empty($_ERROR)) {
			
			// текущее расположение файла
			$current_path = $_FILES['myfile']['tmp_name'];

			// оригинальное имя файла
			$filename = $_FILES['myfile']['name'];

			// место постоянного хранения файла
			$new_path = __DIR__ . '/upload/' . $filename;				

			// перемещение загруженного файла 
			if (move_uploaded_file($current_path, $new_path)) {

				// выводим сообщение об успешной загрузке файла
				$result = "<h3>Файл успешно загружен на сервер</h3>";
				$result .= "<p>Имя файла: <b>$filename</b></p>";
				$result .= "<p>Mime-тип: <b>$mime</b></p>";

				// если это изображение — покажем превью
				if ($mime == 'image/jpeg') {
					$result .= "<img src='upload/" . $filename . "' width='250px'>";
				}

			} else {
				// если во время перемещения возникла ошибка
				$result = "<h3>Не удалось переместить файл в директорию хранения</h3>";
			}	

			// выводим результат перемещения файла в директорию upload
			echo $result;

		} else {

			// выводим массив ошибок
			echo "<pre>";
			print_r($_ERROR);
		}
	?>


</body>
</html>
