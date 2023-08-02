<?php
	include('connection.php');
	include('session.php');			

  if(ISSET($_POST['save']))
  {
	$stud_id = $_POST['stud_number'];
	$stud_name = $_POST['stud_name'];
	$branch = $_POST['branch'];
    $a = $_POST['review_program'];
	$b = $_POST['downpayment'];
	$c = $_POST['or_date'];
	$d = $_POST['amount'];
	$e = $_POST['pr'];
	$f = $_POST['balance'];
	$g = $_POST['remarks'];

				mysqli_query($conn, "INSERT INTO `es_payments` VALUES('', '$stud_id', '$stud_name', '$branch', '$a', '$b', '$c', '$d', '$e', '$f', '', '$g')") or die(mysqli_error());				

				echo "<script>alert('Payment has been successfully added.')</script>";
				header("location: student_list.php");
			}		
  else
    {
			echo "<script>alert('Payment did not save successfully.')</script>";
		}

?>

