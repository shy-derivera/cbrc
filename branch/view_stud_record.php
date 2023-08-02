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
<?php	include('session.php');	 ?>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
		<?php include('../includes/logo.php'); ?>
			<!--navigation-->
			<?php include('../includes/branch_nav.php'); ?>
			<!--end navigation-->			
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?php include('../includes/branch_header.php'); ?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Student Management</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">View Student Record</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
						
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">STUDENT RECORD</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
									    <th>Date Enrolled</th>
									    <th>Photo</th>
										<th>Student #</th>
										<th>Lastname</th>
										<th>Firstname</th>
										<th>Middle Name</th>
										<th>Suffix</th>
										<th>Sex</th>
										<th>Age</th>
										<th>Address</th>
										<th>CP #</th>
										<th>Birthday</th>
										<th>Status</th>
										<th>School</th>
										<th>Year Graduated</th>
										<th>Prev. Rev Center</th>
										<th># of times taken</th>
										<th>Contact Person</th>
										<th>Relationship</th>
										<th>CP #</th>
										<th>School Branch</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
								<?php
				include('connection.php');

				$student_number = $_REQUEST['stud_number'];

				$query=mysqli_query($conn,"SELECT * FROM `es_students` WHERE student_number = '$student_number'");
				while($row=mysqli_fetch_array($query)){
					$student_number = $row['student_number']
					?>
					<tr>
				    	<td><?php echo $row['enrolled_date']; ?></td>
					    <td> <img src="../<?php echo $row['photo']; ?>" class="user-img" alt="user avatar" /></td>
                        <td><?php echo $row['student_number']; ?></td>
						<td><?php echo $row['lastname']; ?></td>
						<td><?php echo $row['firstname']; ?></td>
						<td><?php echo $row['middle_name']; ?></td>
						<td><?php echo $row['suffix']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
						<td><?php echo $row['age']; ?></td>
						<td><?php echo $row['address']; ?></td>
						<td><?php echo $row['cp_number']; ?></td>
						<td><?php echo $row['birthday']; ?></td>
						<td><?php echo $row['marital_status']; ?></td>
						<td><?php echo $row['school']; ?></td>
						<td><?php echo $row['year_graduated']; ?></td>
						<td><?php echo $row['prev_rev_center']; ?></td>
						<td><?php echo $row['no_of_times_taken']; ?></td>
						<td><?php echo $row['name_to_contact']; ?></td>
						<td><?php echo $row['relationship']; ?></td>
						<td><?php echo $row['cp_number_of_cp']; ?></td>
						<td><?php echo $row['school_branch']; ?></td>
						<td><?php echo $row['status']; ?></td>
                    </tr>
					<?php
				}
                
			?>   
								</tbody>								
							</table>
						</div>
					</div>
				</div>
				
                <h6 class="mb-0 text-uppercase">PAYMENT RECORD</h6>
				<hr/>

				<div class="card">
				<a href="add_payment.php?stud_number=<?php
				$student_number = $_REQUEST['stud_number'];
				 echo $student_number; ?> & stud_name=<?php
				 $student_name = $_REQUEST['stud_name'];
				  echo $student_name; ?>" class="btn btn-success col-sm-2" style="margin-top:10px; margin-left:15px;"><i class="bx bx-money"></i>ADD PAYMENT</a> 
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
									    <th>Enrolled Review Program</th>
										<th>Receipt</th>
										<th>Down Payment</th>
										<th>OR Date</th>
										<th>Amount</th>
										<th>PR Number</th>
										<th>Balance</th>
										<th>Remarks</th>
									</tr>
								</thead>
								<tbody>
								<?php
				include('connection.php');

				$student_number = $_REQUEST['stud_number'];

				$query=mysqli_query($conn,"SELECT * FROM `es_payments` WHERE student_id = '$student_number'");
				while($row=mysqli_fetch_array($query)){
					$student_number = $row['student_id']
					?>
					<tr>
                        <td><?php echo $row['review_program']; ?></td>
						<td> <img src="../<?php echo $row['photo']; ?>" class="user-img" alt="user avatar" /></td>
						<td><?php echo $row['downpayment']; ?></td>
						<td><?php echo $row['or_date']; ?></td>
						<td><?php echo $row['amount']; ?></td>
						<td><?php echo $row['pr_number']; ?></td>
                        <td><?php echo $row['balance']; ?></td>
						<td><?php echo $row['remarks']; ?></td>
                    </tr>
					<?php
				}
                
			?>   
								</tbody>								
							</table>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->
	
	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		  } );
	</script>
	
	<!--app JS-->
	<script src="assets/js/app.js"></script>
</body>

</html>