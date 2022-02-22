<?php


$files = glob('*.htm*');

foreach ($files as $filename) {
echo "<li> <a href=$filename target='new'>$filename</a>" ;
}
?>