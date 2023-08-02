<?php
	include('connection.php');
	//include('session.php');			

  if(ISSET($_POST['save']))
  {
		$image_name = $_FILES['photo']['name'];
		$image_temp = $_FILES['photo']['tmp_name'];
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		$path = "admin/upload/".$name;
		$allowed_ext = array("gif", "jpg", "jpeg", "png");

		$image_name = $_FILES['receipt']['name'];
		$image_temp = $_FILES['receipt']['tmp_name'];
		$exp = explode(".", $image_name);
		$end = end($exp);
		$name = time().".".$end;
		$path1 = "admin/upload/".$name;
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
    $i = $_POST['status'];
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

    $season = $_POST['season'];	
	$rp = $_POST['rp'];
	$dp = $_POST['downpayment'];
	$amount = $_POST['amount'];
	$remarks = $_POST['remarks'];
	$date = date('Y-m-d');

	//Query
$sql="SELECT * FROM es_payments WHERE student_name='$name' and review_program='$rp'";
$result=mysqli_query($conn,$sql);
// mysqli_num_row is counting table row
if(mysqli_num_rows($result) >= 1){
	echo 'You have already enrolled on the same REVIEW PROGRAM you are enrolling for!!';
	exit;
}

		if(in_array($end, $allowed_ext)){
			if(move_uploaded_file($image_temp, $path)){
				mysqli_query($conn, "INSERT INTO `es_students` VALUES('', '$a', '$b', '$c', '$d', '$e', '$path', '$j', '$k', '$l', '$m', '$n', '$o', '$h', '$g','$f','$i', '$p',
        '$q','$r', '$u', '$v', 'AGREE', 'UNVERIFIED', '$date')") or die(mysqli_error());

				mysqli_query($conn, "INSERT INTO `es_users` VALUES('', '$b', '$c', '$d', '$e', '$s', '$t', '$path', 'STUDENT', '$v', 'INACTIVE')") or die(mysqli_error());

				mysqli_query($conn, "INSERT INTO `es_payments` VALUES('', '$a', '$name', '$v', '$season', '$rp', '$dp', '$date', '$amount',
				'', '', '$path1', '$remarks')") or die(mysqli_error());	
				
				echo "<script>alert('Student has been successfully enrolled.')</script>";
				//header("location: payment.php?stud_number=$a & stud_name= $name & branch= $u");
				header("location: notification.html");
			}	
		
  }
  else
    {
			echo "<script>alert('Please upload an image only.')</script>";
		}
	}	
?>

