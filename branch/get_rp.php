<?php
	$conn = new mysqli('localhost', 'root', '', 'enrollment_system') or die(mysqli_error());
	$rp = $conn->prepare("SELECT * FROM `es_review_programs` WHERE `program_group` = '$_REQUEST[program_group]'") or die(mysqli_error());
		echo '<option value = "">Select Review Program</option>';
	if($rp->execute()){
		$a_result = $rp->get_result();
	}
		while($f_rp = $a_result->fetch_array()){
			echo '<option value = "'.$f_rp['program_description'].'">'.$f_rp['program_description'].'</option>';
		}
?>