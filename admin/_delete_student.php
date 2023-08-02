<?php
	$stud_num=$_GET['stud_num'];
	include('connection.php');
	$sql = "INSERT INTO `es_archive_students` VALUES '$stud_num'";
	$query = mysqli_query($conn,$sql);
	header('location:student_list.php');
?>