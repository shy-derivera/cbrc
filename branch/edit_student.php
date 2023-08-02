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
								<li class="breadcrumb-item active" aria-current="page">Enroll Students</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="student_list.php" class="btn btn-primary px-5 radius-30" style="margin-right:10px;"><- BACK</a>							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h3 class="mb-0 text-uppercase">Add Students</h3>
				<hr/>
				
				<div class="form-body">
				<?php
	            include('connection.php');
	            $stud_num=$_GET['stud_num'];
	            $query=mysqli_query($conn,"select * from `es_students` where student_number ='$stud_num'");
	            $row=mysqli_fetch_array($query);
            ?>
										<form method="POST" action="process_update_student.php?stud_num=<?php echo $stud_num; ?>" enctype="multipart/form-data" class="row g-3">
										  <div class="col-sm-2">
												<label for="" class="form-label">Student #</label>
												<input type="text" name="student_number" value="<?php echo $row['student_number']; ?>" class="form-control" readonly placeholder="Student #" required>
											</div>
											<div class="col-sm-3">
												<label for="" class="form-label">First Name</label>
												<input type="text" name="fn" value="<?php echo $row['firstname']; ?>" class="form-control" placeholder="First Name" required>
											</div>
											<div class="col-sm-3">
												<label for="" class="form-label">Middle Name</label>
												<input type="text" name="mn" value="<?php echo $row['middle_name']; ?>" class="form-control" placeholder="Middle Name" required>
											</div>
											<div class="col-sm-3">
												<label for="" class="form-label">Last Name</label>
												<input type="text" name="ln" value="<?php echo $row['lastname']; ?>" class="form-control" placeholder="Last Name" required>
											</div>
											<div class="col-sm-1">
												<label for="" class="form-label">Suffix</label>
												<input type="text" name="suffix" value="<?php echo $row['suffix']; ?>" class="form-control" placeholder="Suffix">
											</div>

											<div class="col-2">
												<label for="" class="form-label">Birthday</label>
												<div class="input-group" id="show_hide_password">
													<input type="date" name="bday" value="<?php echo $row['birthday']; ?>" class="form-control border-end-0" value="" placeholder="" required> 
												</div>
											</div>
											<div class="col-2">
												<label for="" class="form-label">Age</label>
												<div class="input-group" id="show_hide_password">
													<input type="number" name="age" value="<?php echo $row['age']; ?>" class="form-control border-end-0" value="" placeholder="Age" required> 
												</div>
											</div>
											<div class="col-2">
												<label for="" class="form-label">Gender</label>
												<label for="inputSelectCountry" class="form-label">Status</label>
												<select class="form-select" name="gender" aria-label="Default select example" required>
													<option value="<?php echo $row['sex']; ?>"><?php echo $row['sex']; ?></option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
											<div class="col-2">
											  <label for="" class="form-label">Marital Status</label>
												<select class="form-select" name="status" aria-label="Default select example" required>
													<option value="<?php echo $row['marital_status']; ?>"><?php echo $row['marital_status']; ?></option>
													<option value="Single">Single</option>
													<option value="Married">Married</option>
													<option value="Widowed">Widowed</option>
													<option value="Legally Seperated">Legally Seperated</option>
												</select>
											</div>
											<div class="col-4">
												<label for="" class="form-label">Contact #</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="cp1" value="<?php echo $row['cp_number']; ?>" class="form-control border-end-0" value="" placeholder="Contact #"> 
												</div>
											</div>
											<div class="col-8">
												<label for="" class="form-label">Address</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="address1" value="<?php echo $row['address']; ?>" class="form-control border-end-0" value="" placeholder="Address" required> 
												</div>
											</div>
											<div class="col-4">
												<label for="i" class="form-label">School Graduated</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="school" value="<?php echo $row['school']; ?>" class="form-control border-end-0" value="" placeholder="School Graduated" required> 
												</div>
											</div>
											<div class="col-2">
												<label for="" class="form-label">Year Graduated</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="year_graduated" value="<?php echo $row['year_graduated']; ?>" class="form-control border-end-0" value="" placeholder="Year Graduated (ex: 2021)"> 
												</div>
											</div>
											<div class="col-4">
												<label for="" class="form-label">Previous Review Center</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="review_center" value="<?php echo $row['prev_rev_center']; ?>" class="form-control border-end-0" value="" placeholder="Previous Review Center"> 
												</div>
											</div>
											<div class="col-2">
												<label for="" class="form-label">Number of times taken</label>
												<div class="input-group" id="show_hide_password">
													<input type="number" name="times_taken" value="<?php echo $row['no_of_times_taken']; ?>" class="form-control border-end-0" value="" placeholder="Number of times taken"> 
												</div>
											</div>
											<div class="col-6">
												<label for="" class="form-label">Contact person in case of emergency</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="contact_person" value="<?php echo $row['name_to_contact']; ?>" class="form-control border-end-0" value="" placeholder="Contact person in case of emergency" required> 
												</div>
											</div>
											<div class="col-3">
												<label for="" class="form-label">Relationship</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="relationship" value="<?php echo $row['relationship']; ?>" class="form-control border-end-0" value="" placeholder="Relationship" required> 
												</div>
											</div>
											<div class="col-3">
												<label for="" class="form-label">Contact #</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="cp2" value="<?php echo $row['cp_number_of_cp']; ?>" class="form-control border-end-0" value="" placeholder="Contact #" required> 
												</div>
											</div>
                                           
											<div class="col-3">
											<label for="" class="form-label">Student Status</label>
												<select class="form-select" name="status" aria-label="Default select example" required>
												    <option value="<?php echo $row['status']; ?>"><?php echo $row['status']; ?></option>
													<option value="VERIFIED">VERIFIED</option>
													<option value="UNVERIFIED">UNVERIFIED</option>
													<option value="DROPPED OUT">DROPPED OUT</option>
													<option value="INACTIVE">INACTIVE</option>
												</select>
											</div>
                                            <div class="col-3">
											<label for="" class="form-label">SELECT SCHOOL BRANCH</label>
											<select id ="group" class="form-control" name="branch" required>
								             <option value="<?php echo $row['school_branch']; ?>"><?php echo $row['school_branch']; ?></option>
								<?php
								    include('connection.php');
									$g_transaction = $conn->prepare("SELECT * FROM `es_branch` WHERE branch = '$branch' GROUP BY `branch`");
									if($g_transaction->execute()){
										$g_result = $g_transaction->get_result();
									}
									while($f_gtransaction = $g_result->fetch_array()){
								?>
									<option value = "<?php echo $f_gtransaction['branch']?>"><?php echo $f_gtransaction['branch']?></option>
								<?php
										}
									$conn->close();	
								?>
							</select>     
											</div>
											
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="save" class="btn btn-primary"><i class='bx bx-user'></i>SAVE</button>
												</div>
											</div>
										</form>
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