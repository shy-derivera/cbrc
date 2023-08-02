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

    $a = $_POST['lecturer_id'];
	$b = $_POST['fn'];
    $c = $_POST['mn'];
	$d = $_POST['ln'];
    $e = $_POST['suffix'];
	$f = $_POST['bday'];
    $g = $_POST['age'];
	$h = $_POST['gender'];
    $i = $_POST['status'];
	$j = $_POST['cp1'];
    $k = $_POST['address1'];
	$l = $_POST['school'];
    $m = $_POST['year_graduated'];
	$n = $_POST['educ_attainment'];
    $o = $_POST['rank'];
	$p = $_POST['rate'];
	$q = $_POST['branch'];


		if(in_array($end, $allowed_ext)){
			if(move_uploaded_file($image_temp, $path)){
				mysqli_query($conn, "INSERT INTO `es_lecturers` VALUES('', '$a', '$b', '$c', '$d', '$e', '$path', '$k', '$j', '$n', '$l', '$m', '$o', '$h','$g','$f', '$i', '$p', '$q', 'ACTIVE')") or die(mysqli_error());				


				mysqli_query($conn, "INSERT INTO `es_users` VALUES('', '$b', '$c', '$d', '$e', '$b', '$d', '$path', 'LECTURER', '$q', 'ACTIVE')") or die(mysqli_error());

				echo "<script>alert('New Lecturer has been successfully added.')</script>";
				header("location: view_lecturers.php");
			}	
		
  }
  else
    {
			echo "<script>alert('Please upload an image only.')</script>";
		}
	}	
?>

