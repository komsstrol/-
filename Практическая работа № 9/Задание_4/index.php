<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Отправка данных на сервер</h1>
	<h2>Отправка данных в строке запроса</h2>
		
	<?php
		// подключаем массив с альбомами группы
		require "albums.php";
		
		// id - идентификатор альбома, информацию о котором необходимо передать	
		// можно задать в коде 
		$id = 2;
		
		// можно передать GET-параметром
		// $id = $_GET["id"];

		// объявим массив для сбора информации
		$album = array();
		
		// запускаем цикл по массиву
		foreach ($albums as $item){
			if ($item["id"] == $id) {
				
				// в данном примере обходимся без вложенного цикла
				// конечная цель - привести массив к строке,
				// воспринимаемой браузером как массив

				$album[] = "id={$item['id']}";  
				$album[] = "album_name={$item['album_name']}";
				$album[] = "date={$item['date']}";
				// label, format, status — вложенные массивы, склеиваем их через запятую
				$album[] = "label=" . implode(", ", $item['label']);
				$album[] = "format=" . implode(", ", $item['format']);
				$album[] = "status=" . implode(", ", $item['status']);
			}
		}
		
		// преобразуем массив в строку с разделителем &
		$queryString = implode("&", $album);

		// выводим ссылку с GET-параметрами		
		echo "<a href='server.php?{$queryString}'>Перейти к информации об альбоме</a>";
	?>
	

</body>
</html>
