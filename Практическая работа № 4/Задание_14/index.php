<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Задание 14 - Альбомы и треки</title>
</head>
<body>

<?php

require_once 'albums.php';
require_once 'tracks.php';


$id_album = isset($_GET['id']) ? $_GET['id'] : null;

if ($id_album !== null) {
   
    $album_found = false;
    
    foreach ($albums as $album) {
        if ($album['id_album'] == $id_album) {
            $album_found = true;
            echo "<strong>" . $album['title'] . " (" . $album['country'] . ")</strong><br>";
            
            foreach ($tracks as $track) {
                if ($track['id_album'] == $id_album) {
                    echo "• " . $track['name'] . "<br>";
                }
            }
            break;
        }
    }
    
    if (!$album_found) {
        echo "<p>Альбом с id = " . htmlspecialchars($id_album) . " не найден.</p>";
    }
    
} else {
    
    foreach ($albums as $album) {
        echo "<strong>" . $album['title'] . " (" . $album['country'] . ")</strong><br>";
        
        foreach ($tracks as $track) {
            if ($track['id_album'] == $album['id_album']) {
                echo "• " . $track['name'] . "<br>";
            }
        }
        
        echo "<br>";
    }
}
?>

</body>
</html>