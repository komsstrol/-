<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>

	<h1>Управляющие конструкции</h1>

	<h2>Циклы</h2>
	<hr>
	<h2>Вывод массива</h2>

	<?php
		$team = array(
		  array('id_team' => '1','name' => 'Aerosmith','country' => 'США','date' => '1970','style' => 'хард-рок'),
		  array('id_team' => '2','name' => 'Pink Floyd','country' => 'Великобритания','date' => '1965','style' => 'психоделический-рок'),
		  array('id_team' => '3','name' => 'The Beatles','country' => 'Великобритания','date' => '1960','style' => 'рок-н-ролл'),
		  array('id_team' => '4','name' => 'AC/DC','country' => 'Австралия','date' => '1973','style' => 'хард-блюз-рок'),
		  array('id_team' => '5','name' => 'Scorpions','country' => 'ФРГ','date' => '1965','style' => 'хард-рок'),
		  array('id_team' => '6','name' => 'Ленинград','country' => 'Россия','date' => '1997','style' => 'ска, фолк, панк')
		);
		
		// используя цикл foreach выполняем обход массива $team
		foreach ($team as $key => $item) {
			echo "
				Группа: {$item['name']} (id = {$item['id_team']})<br/>
				Страна: {$item['country']}<br />
				Дата основания: {$item['date']}<br />
				Стиль: {$item['style']}<br />
				<hr/><p>
				";
		}	
	?>


</body>
</html>