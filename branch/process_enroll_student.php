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

    		$stud_number = $_POST['student_number'];
		$fn = $_POST['fn'];
    		$mn = $_POST['mn'];
		$ln = $_POST['ln'];
    		$suffix = $_POST['suffix'];
		$name = $d . ', ' . $b . ' ' . $c . ' ' . $e;
		$bday = $_POST['bday'];
    		$age = $_POST['age'];
		$gender = $_POST['gender'];
    		$mstatus = $_POST['mstatus'];
		$cp = $_POST['cp1'];
    		$address = $_POST['address1'];
		$school = $_POST['school'];
    		$yg = $_POST['year_graduated'];
		$rc = $_POST['review_center'];
    		$tt = $_POST['times_taken'];
		$contact_p = $_POST['contact_person'];
    		$relationship = $_POST['relationship'];
		$cp1 = $_POST['cp2'];
    		$username = $_POST['username'];
		$password = $_POST['password'];
		$location = $_POST['location'];
		$branch = $_POST['branch'];
		$date = date('m-d-Y');

		if(in_array($end, $allowed_ext)){
			if(move_uploaded_file($image_temp, $path)){


				mysqli_query($conn, "INSERT INTO es_students (student_number, firstname, middle_name, lastname, suffix, photo, cp_number, address, school, year_graduated, prev_rev_center, no_of_times_taken, sex, age, birthday, marital_status, name_to_contact, relationship, cp_number_of_cp, school_location, school_branch, terms_condition, status, enrolled_date)
		VALUES ('$stud_number', '$fn', '$mn', '$ln', '$suffix', '$path', '$cp', '$address', '$school', '$yg', '$rc', '$tt', '$gender', '$age', '$bday', '$mstatus', '$contact_p', '$relationship', '$cp1', '$location', '$branch', 'AGREE', 'active', '$date');") or die(mysqli_error());

				mysqli_query($conn, "INSERT INTO `es_users`(`user_firstname`, `user_mn`, `user_lastname`, `user_suffix`, `user_username`, `user_password`, `user_photo`, `user_account_type`, `user_branch`, `user_status`) 
		VALUES ('$fn','$mn','$ln','$suffix','$username','$password','$path','STUDENT','$branch','ACTIVE')");

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

