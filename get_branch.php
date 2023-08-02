<?php
	$conn = new mysqli('localhost', 'root', '', 'enrollment_system') or die(mysqli_error());
	$branch = $conn->prepare("SELECT * FROM `es_branch` WHERE `branch_group` = '$_REQUEST[branch_group]'") or die(mysqli_error());
		echo '<option value = "">Select School Branch</option>';
	if($branch->execute()){
		$a_result = $branch->get_result();
	}
		while($f_branch = $a_result->fetch_array()){
			echo '<option value = "'.$f_branch['branch'].'">'.$f_branch['branch'].'</option>';
		}
?>