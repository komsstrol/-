<?php
echo "<h3>Вариант 1: include</h3>";
for($i=1; $i<=5; $i++) {
    include $i . ".txt";
    echo "<br />";
}

echo "<h3>Вариант 2: require</h3>";
for($i=1; $i<=5; $i++) {
    require $i . ".txt";
    echo "<br />";
}
?>