<?php
	include('connection.php');
	include('session.php');			


	$id=$_GET['id'];
    $a = $_POST['title'];
	$b = $_POST['description'];
	$c = $_POST['date_posted'];
	$d = $_POST['group'];
	
	mysqli_query($conn,"UPDATE `es_branch_announcement` set title='$a', body='$b', date_posted='$c', view_group='$d' WHERE id='$id'");
				 header("location:view_announcement.php");
	
?>

