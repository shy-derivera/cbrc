<?php
	include('connection.php');
	include('session.php');			

  if(ISSET($_POST['save']))
  {
    $a = $_POST['code'];
	$b = $_POST['description'];
	$c = $_POST['fee'];
	$d = $_POST['season'];


				mysqli_query($conn, "INSERT INTO `es_review_programs` VALUES('', '$d', '$a', '$b', '$c')") or die(mysqli_error());				

				echo "<script>alert('Review Program has been successfully added.')</script>";
				header("location: review_programs.php");
			}		
  else
    {
			echo "<script>alert('Record did not save successfully.')</script>";
		}

?>

