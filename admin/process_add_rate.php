<?php
	include('connection.php');
	include('session.php');			

  if(ISSET($_POST['save']))
  {
        $a = $_POST['rate'];

				mysqli_query($conn, "INSERT INTO `es_rate` VALUES('', '$a')") or die(mysqli_error());				

				echo "<script>alert('New Rate has been successfully added.')</script>";
				header("location: rate.php");
			}		
  else
    {
			echo "<script>alert('Record did not save successfully.')</script>";
		}

?>

