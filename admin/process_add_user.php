<?php
	include('connection.php');
	include('session.php');			

  if(ISSET($_POST['save']))
  {
		$image_name = $_FILES['photo']['name'];
		$image_temp = $_FILES['photo']['tmp_name'];
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		$path = "upload/".$name;
		$allowed_ext = array("gif", "jpg", "jpeg", "png");

		$b = $_POST['fn'];
    	$c = $_POST['mn'];
		$d = $_POST['ln'];
    	$e = $_POST['suffix'];
		$f = $_POST['username'];
    	$g = $_POST['password'];
		$h = $_POST['type'];
    	$i = $_POST['status'];
		$j = $_POST['branch'];



		if(in_array($end, $allowed_ext)){
			if(move_uploaded_file($image_temp, $path)){
				mysqli_query($conn, "INSERT INTO `es_users` VALUES('', '$b', '$c', '$d', '$e', '$f', '$g', '$path', '$h', '$j','$i')") or die(mysqli_error());				

				echo "<script>alert('New user has been successfully added.')</script>";
				header("location: user_management.php");
			}	
		
  }
  else
    {
			echo "<script>alert('Please upload an image only.')</script>";
		}
	}	
?>

