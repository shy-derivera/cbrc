<?php
	include('connection.php');
	include('session.php');			

  if(ISSET($_POST['save']))
  {
	    $lec_id = $_REQUEST['lec_id'];
		$lec_name = $_REQUEST['lec_name'];
        $a = $_POST['review_program'];
		$b = $_POST['day'];
		$c = $_POST['from'];
		$d = $_POST['to'];
		$e = $_POST['branch'];


				mysqli_query($conn, "INSERT INTO `es_schedule` VALUES('', '$lec_id', '$lec_name', '$a', '$b', '$c', '$d', '$e')") or die(mysqli_error());				

				echo "<script>alert('Schedule of Lecturer has been successfully added.')</script>";
				header("location: view_lecturers_sched.php?lec_id=$lec_id&lec_name=$lec_name");
			}		
  else
    {
			echo "<script>alert('Record did not save successfully.')</script>";
		}

?>

