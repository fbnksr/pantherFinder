<?php
	require_once 'cn.php';
	require_once 'protect.php';

	$troll_face = $_POST['troll_face'];
	$student_first_name = $_POST['student_first_name'];
	$student_last_name = $_POST['student_last_name'];
	$student_id = $_POST['student_id'];
	$student_aid_out = $_POST['student_aid_out'];
	$date_claimed = time();
	$student_aid_id_out = $_POST['student_aid_id_out'];

	if (empty($troll_face) || empty($student_first_name) || empty($student_last_name) || empty($student_id) || empty($student_aid_out) || empty($student_aid_id_out)) {
		header("Location: ../Panther Finder/index.php?error=empty");
		exit();
	} else {
		$sql = 'UPDATE items SET
		student_first_name = "' . $student_first_name . '",
		student_last_name = "' . $student_last_name . '",
		student_id = "' . $student_id . '",
		student_aid_out = "' . $student_aid_out . '",
		date_claimed = "' . $date_claimed . '",
		student_aid_id_out = "' . $student_aid_id_out . '",
		claimed = 1
		WHERE id= "' . $troll_face . '"';

		$result = mysqli_query($cn, $sql) or die(mysqli_error($cn));
		header("Location: /");
	}
?>
