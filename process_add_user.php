<?php
	include('connection.php');			
	
    $a =$_POST['fn'];
	$b =$_POST['mi'];
	$c =$_POST['ln'];
	$d =$_POST['department'];
	$e =$_POST['un'];
	$f =$_POST['pass'];
	$cp =$_POST['cp'];

	//$query=mysqli_query($conn, "SELECT * FROM ohds_department WHERE department = '$a' LIMIT 1")or die(mysql_error());
	//while($row=mysqli_fetch_array($query))	
    //$code =  $row['code'];	
	
	$check = $query=mysqli_query($conn,"SELECT * FROM `ohds_user` WHERE user_firstname = '$a' 
	AND user_mi = '$b' AND user_lastname='$c'");

	$verify = mysqli_num_rows($check);

	if ($verify > 0){
		die("Client is already registered!");
		//echo"<script>window.alert('User is already exist!.')</script>";
	}

	mysqli_query($conn,"insert into `ohds_user` (user_firstname, user_mi, user_lastname, user_department,
	user_username, user_password, cp_number, user_account_type, user_status)
	 values ('$a', '$b', '$c', '$d', '$e', '$f', '$cp', 'CLIENT', 'PENDING')");
	header('location:index.php');

	
?>