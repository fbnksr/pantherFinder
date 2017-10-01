<?php
$cn = mysqli_connect('ocelot.aul.fiu.edu', 'spr17_kangl010', '4267233', 'spr17_kangl010') or
// $cn = mysqli_connect('localhost', 'root', '') or
// 	die('Connection unsuccessful');

mysqli_select_db($cn, 'spr17_kangl010') or
// mysqli_select_db($cn, 'panther_finder') or
	die(mysqli_error($cn));
?>
