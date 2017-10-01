<?php
function protect($i) {
	$i = trim($i);
	$i = stripslashes($i);
	$i = htmlentities($i, ENT_QUOTES);
	$i = mysqli_real_escape_string($i);

	return $i;
}
?>