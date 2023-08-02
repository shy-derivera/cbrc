<?php
	include('connection.php');
	include('session.php');			

  if(ISSET($_POST['save']))
  {
        $a = $_POST['title'];
		$b = $_POST['description'];
		$c = $_POST['date_posted'];
		$d = $_POST['group'];

				mysqli_query($conn, "INSERT INTO `es_branch_announcement` VALUES('', '$a', '$b', '$c', '$d')") or die(mysqli_error());				

				echo "<script>alert('Annoucenment has been successfully added.')</script>";
				header("location: view_announcement.php");
			}		
  else
    {
			echo "<script>alert('Record did not save successfully.')</script>";
		}

?>

