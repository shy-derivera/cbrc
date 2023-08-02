<?php
    include('connection.php');
	$a=$_GET['id'];

	mysqli_query($conn,"DELETE FROM `es_rate` where rate_id = '$a'");
	header('location:rate.php');
?>