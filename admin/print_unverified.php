<!doctype html>
<html lang="en" class="semi-dark">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/semi-dark.css" />
	<title>CBRC Enrollment System</title>
</head>

<body>
    <center>
        <div style="width:900px;">
        <img src="images/logo.png" width="250">
        <h3>LIST OF STUDENT PENDING FOR ENROLLMENT</h3><br>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Student #</th>
										<th>Lastname</th>
										<th>Firstname</th>
										<th>Middle Name</th>
										<th>Sex</th>
										<th>Age</th>
										<th>Address</th>
										<th>School Branch</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
								<?php
				include('connection.php');

				$query=mysqli_query($conn,"SELECT * FROM `es_students` WHERE status = 'UNVERIFIED'");
				while($row=mysqli_fetch_array($query)){
					$student_number = $row['student_number'];
					$school = $row['school_branch'];
					$name = $row['lastname'] . ', ' . $row['firstname'] . ' ' . $row['middle_name'] . ' ' . $row['suffix'];
					?>
					<tr>
                        <td><?php echo $row['student_number']; ?></td>
						            <td><?php echo $row['lastname']; ?></td>
												<td><?php echo $row['firstname']; ?></td>
												<td><?php echo $row['middle_name']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
												<td><?php echo $row['age']; ?></td>
												<td><?php echo $row['address']; ?></td>
												<td><?php echo $row['school_branch']; ?></td>
												<td><?php echo $row['status']; ?></td>
											
                    </tr>
					<?php
				}
                
			?>   
								</tbody>								
							</table>
        </div>
    </center>
</body>