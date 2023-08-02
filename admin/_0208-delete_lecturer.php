<?php
	$a=$_GET['lec_id'];
	include('connection.php');

	mysqli_query($conn,"INSERT INTO `es_archive`_lecturers VALUES ('$a')");
	header('location:archive.php');
?>