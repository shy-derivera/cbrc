<?php
	include('connection.php');
	include('session.php');			


	$stud_num=$_GET['stud_num'];
	$a = $_POST['student_number'];
	$b = $_POST['fn'];
	$c = $_POST['mn'];
	$d = $_POST['ln'];
	$e = $_POST['suffix'];
	$name = $d . ', ' . $b . ' ' . $c . ' ' . $e;
	$f = $_POST['bday'];
	$g = $_POST['age'];
	$h = $_POST['gender'];
	$i = $_POST['status'];
	$j = $_POST['cp1'];
	$k = $_POST['address1'];
	$l = $_POST['school'];
	$m = $_POST['year_graduated'];
	$n = $_POST['review_center'];
	$o = $_POST['times_taken'];
	$p = $_POST['contact_person'];
	$q = $_POST['relationship'];
	$r = $_POST['cp2'];
	$s = $_POST['username'];
	$t = $_POST['password'];
	$u = $_POST['agree'];
	$v = $_POST['branch'];

	
	mysqli_query($conn,"UPDATE `es_students` set firstname='$b', middle_name='$c', lastname='$d', suffix='$e', cp_number='$j', address='$k', school='$l', year_graduated='$m', prev_rev_center='$n', no_of_times_taken='$o', sex='$h', age='$g', birthday='$f', marital_status='$i', name_to_contact='$p', relationship='$q', cp_number_of_cp='$r', school_branch='$v' WHERE student_number='$stud_num'");
				 header('location:student_list.php');
	
?>

