<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 12 - Альбомы и треки</title>
</head>
<body>

<h1>Список альбомов и треков</h1>

<?php

require_once 'albums.php';
require_once 'tracks.php';

foreach ($albums as $album) {
    
    echo $album['title'] . " (" . $album['country'] . ")<br>";

    foreach ($tracks as $track) {
       
        if ($track['id_album'] == $album['id_album']) {
            echo "• " . $track['name'] . "<br>";
        }
    }
    
    echo "<br>"; 
}
?>

</body>
</html>