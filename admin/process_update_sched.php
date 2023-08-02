<?php
	include('connection.php');
	include('session.php');			


	$lec_id=$_GET['lec_id'];
	$sched_id=$_POST['sched_id'];
	$lec_name=$_POST['lec_name'];
    $a = $_POST['review_program'];
	$b = $_POST['day'];
    $c = $_POST['from'];
	$d = $_POST['to'];
	$e = $_POST['branch'];

	
	mysqli_query($conn,"UPDATE `es_schedule` set review_program='$a', day='$b', time_from='$c', time_to='$d', branch='$e' WHERE lecturer_id='$lec_id' AND sched_id='$sched_id'");
				 header("location:view_lecturers_sched.php?lec_id=$lec_id & lec_name=$lec_name");
	
?>

