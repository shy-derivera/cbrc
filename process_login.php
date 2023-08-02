<?php
session_start();
     
//include the database connection
include("connection.php"); 

$username=$_POST['username']; // username sent from form 
$password=$_POST['password']; // password sent from form 


//Query
$sql="SELECT * FROM es_users WHERE user_username='$username' and user_password='$password'";
$result=mysqli_query($conn,$sql);
// mysqli_num_row is counting table row
if(mysqli_num_rows($result) > 0){
$rows = mysqli_fetch_assoc($result);
$row = mysqli_fetch_array($result);

//Direct pages with different user levels
	if ($rows['user_account_type'] == 'ADMINISTRATOR' && $rows['user_status'] == 'ACTIVE') {
		$_SESSION['user_username']  = $rows['user_username'];
		$_SESSION['user_firstname'] = $rows['user_firstname'];
		$_SESSION['user_mn']        = $rows['user_mn'];
		$_SESSION['user_lastname']  = $rows['user_lastname'];
		$_SESSION['user_suffix']  = $rows['user_suffix'];
		$_SESSION['user_photo']  = $rows['user_photo'];
		$_SESSION['user_branch']  = $rows['user_branch'];
		$_SESSION['user_account_type']  = $rows['user_account_type'];
		header('location: admin/dashboard.php'); 
	}
	elseif ($rows['user_account_type'] == 'STUDENT' && $rows['user_status'] == 'ACTIVE') {
	$_SESSION['user_username']  = $rows['user_username'];
	$_SESSION['user_firstname'] = $rows['user_firstname'];
	$_SESSION['user_mn']        = $rows['user_mn'];
	$_SESSION['user_lastname']  = $rows['user_lastname'];
	$_SESSION['user_suffix']  = $rows['user_suffix'];
	$_SESSION['user_photo']  = $rows['user_photo'];
	$_SESSION['user_branch']  = $rows['user_branch'];
	$_SESSION['user_account_type']  = $rows['user_account_type'];
	header('location: student/dashboard.php'); 
  }

  elseif ($rows['user_account_type'] == 'BRANCH' && $rows['user_status'] == 'ACTIVE') {
	$_SESSION['user_username']  = $rows['user_username'];
	$_SESSION['user_firstname'] = $rows['user_firstname'];
	$_SESSION['user_mn']        = $rows['user_mn'];
	$_SESSION['user_lastname']  = $rows['user_lastname'];
	$_SESSION['user_suffix']  = $rows['user_suffix'];
	$_SESSION['user_photo']  = $rows['user_photo'];
	$_SESSION['user_branch']  = $rows['user_branch'];
	$_SESSION['user_account_type']  = $rows['user_account_type'];
	header('location: branch/dashboard.php');}

  elseif
	($rows['user_account_type'] == 'LECTURER' && $rows['user_status'] == 'ACTIVE') {
		$_SESSION['user_username']  = $rows['user_username'];
		$_SESSION['user_firstname'] = $rows['user_firstname'];
		$_SESSION['user_mn']        = $rows['user_mn'];
		$_SESSION['user_lastname']  = $rows['user_lastname'];
		$_SESSION['user_suffix']  = $rows['user_suffix'];
		$_SESSION['user_photo']  = $rows['user_photo'];
		$_SESSION['user_branch']  = $rows['user_branch'];
		$_SESSION['user_account_type']  = $rows['user_account_type'];
		header('location: lecturer/dashboard.php'); 
  }
	else{
		header('location: error.html'); 
	}
}
else
{ 
	// Error login
echo "<script>alert('Access Denied. Either username or password is incorrect!');
						window.location='index.php';
						</script>";
}
?>