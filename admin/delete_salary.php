<?php
	$a=$_GET['lec_id'];
	$b=$_GET['lec_name'];
	include('connection.php');

	mysqli_query($conn,"DELETE FROM `es_salary` where lecturer_id = '$a'");
	header("location:lecturers_salary.php?lec_id=$a & lec_name=$b");
?>