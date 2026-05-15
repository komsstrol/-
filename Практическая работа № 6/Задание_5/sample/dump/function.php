<?php
	// функция получения данных
	function fnGetData () {
		// подключаем файлы, получаем данные
		require 'dump/personnel.php';
		require 'dump/courses.php';
		require 'dump/educations.php';
		
		// возвращаем ассоциативный массив со всеми данными
		return array(
			'personnel' => $personnel,
			'courses' => $courses,
			'educations' => $educations
		);
	}
?>