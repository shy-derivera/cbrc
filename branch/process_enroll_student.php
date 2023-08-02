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
		$path = "../admin/upload/".$name;
		$allowed_ext = array("gif", "jpg", "jpeg", "png");

    $a = $_POST['student_number'];
		$b = $_POST['fn'];
    $c = $_POST['mn'];
		$d = $_POST['ln'];
    $e = $_POST['suffix'];
	$name = $d . ', ' . $b . ' ' . $c . ' ' . $e;
		$f = $_POST['bday'];
    $g = $_POST['age'];
		$h = $_POST['gender'];
    $i = $_POST['mstatus'];
		$j = $_POST['cp1'];
    $k = $_POST['address1'];
		$l = $_POST['school'];
    $m = $_POST['year_graduated'];
		$n = $_POST['review_center'];
    $o = $_POST['times_taken'];
		$p = $_POST['contact_person'];
    $q = $_POST['relationship'];
		$r = $_POST['cp2'];
    $s = $_POST['username'];
		$t = $_POST['password'];
		$u = $_POST['location'];
		$v = $_POST['branch'];
		$date = date('m-d-Y');

		if(in_array($end, $allowed_ext)){
			if(move_uploaded_file($image_temp, $path)){
				mysqli_query($conn, "INSERT INTO `es_students` VALUES('', '$a', '$b', '$c', '$d', '$e', '$path', '$j', '$k', '$l', '$m', '$n', '$o', '$h', '$g','$f','$i', '$p',
        '$q','$r', '$u', '$v', 'AGREE', '$date')") or die(mysqli_error());

				mysqli_query($conn, "INSERT INTO `es_users` VALUES('', '$b', '$c', '$d', '$e', '$s', '$t', '$path', 'STUDENT', '$v', 'ACTIVE')") or die(mysqli_error());

				echo "<script>alert('Student has been successfully enrolled.')</script>";
				header("location: payment.php?stud_number=$a & stud_name= $name & branch= $v");
			}	
		
  }
  else
    {
			echo "<script>alert('Please upload an image only.')</script>";
		}
	}	
?>

