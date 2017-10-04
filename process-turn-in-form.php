<?php
require_once 'cn.php';
require_once 'protect.php';

$item_name = $_POST['item_name'];
$item_description = $_POST['item_description'];
$aid_name_in = $_POST['aid_name_in'];
$item_location = $_POST['item_location'];
$date_turned_in = time();

if (empty($item_name) || empty($item_description) || empty($aid_name_in) || empty($item_location)) {
	header("Location: ../Panther Finder/index.php?error=empty");
	exit();
} else {

$sql = 'INSERT INTO items
	(item_name,
	item_description,
	aid_name_in,
	item_location,
	date_turned_in)
		VALUES
	("' . $item_name . '",
	 "' . $item_description . '",
	 "' . $aid_name_in . '",
	 "' . $item_location . '",
	 "' . $date_turned_in . '")';

$result = mysqli_query($cn, $sql) or
	die(mysqli_error($cn));
	header("Location: /");
}
?>
