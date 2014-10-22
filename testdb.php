<?php
$link = mysql_connect('127.0.0.1', 'root', '');
if (!$link) {
die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);
?>
