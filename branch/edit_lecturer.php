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
					<div class="breadcrumb-title pe-3">Lecturers</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Lecturer</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
							<a href="lecturers_list.php" class="btn btn-primary px-5 radius-30" style="margin-right:10px;"><- BACK</a>							
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h3 class="mb-0 text-uppercase">Add Lecturer</h3>
				<hr/>
				
				<div class="form-body">
				<?php
	            include('connection.php');
	            $lec_id=$_GET['lec_id'];
	            $query=mysqli_query($conn,"select * from `es_lecturers` where lecturer_id ='$lec_id'");
	            $row=mysqli_fetch_array($query);
            ?>
										<form method="POST" action="process_update_lecturer.php?lec_id=<?php echo $lec_id; ?>" enctype="multipart/form-data" class="row g-3">
										  <div class="col-sm-2">
												<label for="" class="form-label">Lecturer ID</label>
												<input type="text" name="lecturer_id" value="<?php echo $row['lecturer_id']; ?>" class="form-control" placeholder="Lecturer ID" readonly required>
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
											<div class="col-3">
												<label for="" class="form-label">Contact #</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="cp1" value="<?php echo $row['contact_number']; ?>" class="form-control border-end-0" value="" placeholder="Contact #"> 
												</div>
											</div>
											<div class="col-6">
												<label for="" class="form-label">Address</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="address1" value="<?php echo $row['address']; ?>" class="form-control border-end-0" value="" placeholder="Address" required> 
												</div>
											</div>
											<div class="col-3">
											<label for="" class="form-label">SELECT SCHOOL BRANCH</label>
											<select id ="group" class="form-control" name="branch" required>
								             <option value="<?php echo $row['branch']; ?>"><?php echo $row['branch']; ?></option>
								<?php
								    include('connection.php');
									$g_transaction = $conn->prepare("SELECT * FROM `es_branch` GROUP BY `branch`");
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
											<div class="col-3">
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
											<div class="col-3">
												<label for="" class="form-label">Highest Educational Attainment</label>
												<select class="form-select" name="educ_attainment" aria-label="Default select example" required>
													<option value="<?php echo $row['educational_attainment']; ?>"><?php echo $row['educational_attainment']; ?></option>
													<option value="Elementary Graduate">Elementary Graduate</option>
													<option value="High School Graduate">High School Graduate</option>
													<option value="College Graduate">College Graduate</option>
													<option value="Masters Degree">Master's Degree</option>
													<option value="Doctorate Degree">Doctorate Degree</option>
												</select>
											</div>
											<div class="col-2">
												<label for="" class="form-label">Rank in Board Exam</label>
												<select class="form-select" name="rank" aria-label="Default select example" required>
													<option value="<?php echo $row['board_rank']; ?>"><?php echo $row['board_rank']; ?></option>
													<option value="TOP 1">TOP 1</option>
													<option value="TOP 2">TOP 2</option>
													<option value="TOP 3">TOP 3</option>
													<option value="TOP 4">TOP 4</option>
													<option value="TOP 5">TOP 5</option>
													<option value="TOP 6">TOP 6</option>
													<option value="TOP 7">TOP 7</option>
													<option value="TOP 8">TOP 8</option>
													<option value="TOP 9">TOP 9</option>
													<option value="TOP 10">TOP 10</option>
												</select>
											</div>
											<div class="col-2">
												<label for="" class="form-label">Rate Per Hour</label>
												<select id = "group" class = "form-control" name = "rate" required>
								<option value="<?php echo $row['rate_per_hour']; ?>"><?php echo $row['rate_per_hour']; ?></option>
								<?php
								   include('connection.php');
									$g_transaction = $conn->prepare("SELECT * FROM `es_rate` GROUP BY `rate`");
									if($g_transaction->execute()){
										$g_result = $g_transaction->get_result();
									}
									while($f_gtransaction = $g_result->fetch_array()){
								?>
									<option value = "<?php echo $f_gtransaction['rate']?>"><?php echo $f_gtransaction['rate']?></option>
								<?php
										}
									$conn->close();	
								?>
							</select>          
											</div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="save" class="btn btn-primary"><i class='bx bx-user'></i>UPDATE LECTURER</button>
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
			<p class="mb-0">Copyright © 2023. All right reserved.</p>
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