<?php
    include('connection.php');
	$a=$_GET['id'];

	mysqli_query($conn,"DELETE FROM `es_branch_announcement` where id = '$a'");
	header("location:view_announcement.php");
?>