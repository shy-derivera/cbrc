<?php
	include('connection.php');
	include('session.php');			

  if(ISSET($_POST['save']))
  {
	    $lec_id = $_REQUEST['lec_id'];
		$lec_name = $_REQUEST['lec_name'];
        $a = $_POST['month'];
		$b = $_POST['year'];
		$c = $_POST['hours'];


		    $query=mysqli_query($conn,"SELECT * FROM `es_lecturers` WHERE lecturer_id = '$lec_id'");
		    while($row=mysqli_fetch_array($query)){
			$lecturer_id = $row['lecturer_id'];
			$rate = $row['rate_per_hour'];
			}
        $total = $c * $rate;

				mysqli_query($conn, "INSERT INTO `es_salary` VALUES('', '$lec_id', '$lec_name', '$a', '$b', '$c', '$total')") or die(mysqli_error());				

				echo "<script>alert('Salary of Lecturer has been successfully added.')</script>";
				header("location: lecturers_salary.php?lec_id=$lec_id&lec_name=$lec_name");
			}		
  else
    {
			echo "<script>alert('Record did not save successfully.')</script>";
		}

?>

