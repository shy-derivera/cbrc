<?php
	include('connection.php');
	include('session.php');			

  if(ISSET($_POST['save']))
  {
        $a = $_POST['branch'];
		$b = $_POST['address'];

				mysqli_query($conn, "INSERT INTO `es_branch` VALUES('', '$a', '$b')") or die(mysqli_error());				

				echo "<script>alert('New branch has been successfully added.')</script>";
				header("location: branch.php");
			}		
  else
    {
			echo "<script>alert('Record did not save successfully.')</script>";
		}

?>

