<?php
	include('connection.php');
	include('session.php');			


	$branch_id=$_GET['branch_id'];
    $a = $_POST['branch'];
	$b = $_POST['address'];
	
	mysqli_query($conn,"UPDATE `es_branch` set branch='$a', address='$b' WHERE branch_id='$branch_id'");
				 header("location:branch.php");
	
?>

