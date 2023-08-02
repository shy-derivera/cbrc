<?php
	include('connection.php');
	include('session.php');			


	$id=$_GET['id'];
    $a = $_POST['code'];
	$b = $_POST['description'];
	$c = $_POST['fee'];

	mysqli_query($conn,"UPDATE `es_review_programs` set program_code='$a', program_description='$b', program_fee='$c' WHERE program_id='$id'");
				 header("location:review_programs.php");
	
?>

