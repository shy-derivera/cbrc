<?php
    include('connection.php');
	$a=$_GET['id'];

	mysqli_query($conn,"DELETE FROM `es_users` where user_id = '$a'");
	header("location:user_management.php");
?>