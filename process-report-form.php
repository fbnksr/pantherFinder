<?php
	require_once 'cn.php';
	require_once 'protect.php';

	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$item_name = $_POST['item_name'];
	$item_description = $_POST['item_description'];
	$date_reported = time();

	if (empty($first_name) || empty($last_name) || empty($email) || empty($item_name) || empty($item_description)){
		header("Location: ../Panther Finder/index.php?error=empty");
		exit();
	} else {
		$sql = 'INSERT INTO reports
		(first_name,
		last_name,
		email,
		item_name,
		item_description,
	  date_reported)
			VALUES
		("' . $first_name . '",
		 "' . $last_name . '",
		 "' . $email . '",
		 "' . $item_name . '",
		 "' . $item_description . '",
		 "' . $date_reported . '")';

		$result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
		header("Location: /");
	}
?>
