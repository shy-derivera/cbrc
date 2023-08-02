<?php
    include('connection.php');
	$a=$_GET['lec_id'];
	$b=$_GET['lec_name'];
	$c=$_GET['sched_id'];

	mysqli_query($conn,"DELETE FROM `es_schedule` where sched_id = '$c'");
	header("location:view_lecturers_sched.php?lec_id=$a & lec_name=$b");
?>