<?php
    include('connection.php');
	$a=$_GET['id'];

	mysqli_query($conn,"DELETE FROM `es_announcement` where id = '$a'");
	header("location:announcement.php");
?>