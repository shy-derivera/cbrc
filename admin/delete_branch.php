<?php
    include('connection.php');
	$a=$_GET['branch_id'];

	mysqli_query($conn,"DELETE FROM `es_branch` where branch_id = '$a'");
	header("location:branch.php");
?>