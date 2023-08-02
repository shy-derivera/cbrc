<?php
	include('connection.php');
	include('session.php');			


	$lec_id=$_GET['lec_id'];
	$lec_name=$_POST['lec_name'];
    $a = $_POST['month'];
	$b = $_POST['year'];
    $c = $_POST['hours'];

	$query=mysqli_query($conn,"SELECT * FROM `es_lecturers` WHERE lecturer_id = '$lec_id'");
	while($row=mysqli_fetch_array($query)){
	$lecturer_id = $row['lecturer_id'];
	$rate = $row['rate_per_hour'];
	}
    $total = $c * $rate;

	
	mysqli_query($conn,"UPDATE `es_salary` set month='$a', year='$b', hours='$c', total_salary='$e', total_salary='$total' WHERE lecturer_id='$lec_id'");
				 header("location:lecturers_salary.php?lec_id=$lec_id & lec_name=$lec_name");
	
?>

