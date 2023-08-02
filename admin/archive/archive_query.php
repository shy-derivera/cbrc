<?php
	date_default_timezone_set("Etc/GMT+8");
	
	require_once './../../connection.php';
	
	$query = mysqli_query($conn, "SELECT * FROM `es_students`");
	$date = date("Y-m-d");
	while($fetch = mysqli_fetch_array($query)){
		if(strtotime($fetch['due_date']) < strtotime($date)){
			mysqli_query($conn, "INSERT INTO `archive` VALUES('', '$fetch[payments]', '$fetch[Students]', '$fetch[Lecturer]', '$fetch[Program]', '$fetch[Branch]')") or die(mysqli_error($conn));
			mysqli_query($conn, "DELETE FROM `payment` WHERE `payments` = '$fetch[payments]'") or die(mysqli_error($conn));
		}
	}
	
?>
