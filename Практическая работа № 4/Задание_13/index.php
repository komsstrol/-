<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 13 - Альбом и треки</title>
</head>
<body>

<?php

require_once 'albums.php';
require_once 'tracks.php';


$id_album = isset($_GET['id']) ? $_GET['id'] : null;

$album_found = false;

foreach ($albums as $album) {

    if ($album['id_album'] == $id_album) {
        $album_found = true;

        echo "## " . $album['title'] . " (" . $album['country'] . ")<br>";

        foreach ($tracks as $track) {
            if ($track['id_album'] == $id_album) {
                echo "• " . $track['name'] . "<br>";
            }
        }
        
        break; 
    }
}


if (!$album_found && $id_album !== null) {
    echo "<p>Альбом с id = " . htmlspecialchars($id_album) . " не найден.</p>";
} elseif ($id_album === null) {
    echo "<p>Укажите параметр id в строке запроса. Пример: ?id=4</p>";
}
?>

</body>
</html>