<?php
	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$Students = $_POST['Students'];
		$Lecturer = $_POST['Lecturer'];
		$Program = $_POST['Program'];
		$Payments = $_POST['Payments'];
		
		$insert = mysqli_query($conn, "INSERT INTO `product` VALUES('', '$Students', '$Lecturer', '$Program', '$Payments')") or die(mysqli_error($conn));
		if($insert)
		header("location: index.php");
	}
?>