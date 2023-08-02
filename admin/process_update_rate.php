<?php
	include('connection.php');
	include('session.php');			


	$id=$_GET['id'];
    $a = $_POST['rate'];
	
	mysqli_query($conn,"UPDATE `es_rate` set rate='$a' WHERE rate_id='$id'");
				 header("location:rate.php");
	
?>

