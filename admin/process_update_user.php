<?php
	include('connection.php');
	include('session.php');			


	$id=$_GET['id'];
	$b = $_POST['fn'];
    $c = $_POST['mn'];
	$d = $_POST['ln'];
    $e = $_POST['suffix'];
	$f = $_POST['username'];
    $g = $_POST['password'];
	$h = $_POST['type'];
    $i = $_POST['status'];
	$j = $_POST['branch'];


	
	mysqli_query($conn,"UPDATE `es_users` set user_firstname='$b', user_mn='$c', user_lastname='$d', user_suffix='$e', user_username='$f', user_password='$g', user_account_type='$h', user_branch='$j', user_status='$i'WHERE user_id='$id'");
				 header('location:user_management.php');
	
?>

