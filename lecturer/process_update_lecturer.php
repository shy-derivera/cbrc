<?php
	include('connection.php');
	include('session.php');			


	$lec_id=$_GET['lec_id'];
    $a = $_POST['lecturer_id'];
	$b = $_POST['fn'];
    $c = $_POST['mn'];
	$d = $_POST['ln'];
    $e = $_POST['suffix'];
	$f = $_POST['bday'];
    $g = $_POST['age'];
	$h = $_POST['gender'];
    $i = $_POST['status'];
	$j = $_POST['cp1'];
    $k = $_POST['address1'];
	$l = $_POST['school'];
    $m = $_POST['year_graduated'];
	$n = $_POST['educ_attainment'];
    $o = $_POST['rank'];
	$p = $_POST['rate'];
	$q = $_POST['branch'];


	
	mysqli_query($conn,"UPDATE `es_lecturers` set firstname='$b', middle_name='$c', lastname='$d', suffix='$e', contact_number='$j', address='$k', educational_attainment='$n', school='$l', year_graduated='$m', board_rank='$o', sex='$h', age='$g', birthday='$f', marital_status='$i' WHERE lecturer_id='$lec_id'");
				 header('location:lecturers_profile.php');
	
?>

