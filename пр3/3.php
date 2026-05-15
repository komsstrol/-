<?php
$user = [
    'surname' => 'Лаврецкая ',
    'name' => 'Елезавета ',
    'patronymic' => 'Викторовна ',
    'login' => 'elizaveta',
    'password' => '12345',
    'email' => 'lovel@mail.ru'
];
?>
<!DOCTYPE <html>
</html>
<head>
    <title>Регестрация</title>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Вы успешно зарегестрированнны на сайте</h2>
    <p>
        <strong><?php echo
$user['surname']. ''.
$user['name']. '' . 
$user['patronymic']; ?></strong><br>
    Логин: <?php echo
$user['login']; ?><br>
    Email: <?php echo
$user['email']; ?><br>
    Пароль <?php echo
$user['password']; ?>
    </p>
</body>
</html>