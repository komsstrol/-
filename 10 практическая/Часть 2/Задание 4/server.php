<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<title>Программирование на языке PHP</title>
</head>
<body>
	
	<h1>Еще о формах</h1>
	<h2>Уважаемый <?= $_POST['name'] ?> <?= $_POST['surname'] ?>!</h2>

	<p>Поздравляем с успешной регистрацией. Ниже приведены ваши данные:</p>

	<pre><?php print_r($_POST); ?></pre>

omsk
</body>
</html>
