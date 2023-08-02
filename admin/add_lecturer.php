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
			<?php include('../includes/admin_nav.php'); ?>
			<!--end navigation-->			
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?php include('../includes/header.php'); ?>
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

					$query=mysqli_query($conn,"SELECT * FROM `es_lecturers`");
					while($row=mysqli_fetch_array($query)){
						$number = $row['lecturer_id'];
						$series = $number + 1;
					}
												?>
										<form method="POST" action="process_add_lecturer.php" enctype="multipart/form-data" class="row g-3">
										  <div class="col-sm-2">
												<label for="" class="form-label">Lecturer ID</label>
												<input type="text" name="lecturer_id" class="form-control" placeholder="Lecturer ID" viewonly value=<?php echo $series;?>>
											</div>
											<div class="col-sm-3">
												<label for="" class="form-label">First Name</label>
												<input type="text" name="fn" class="form-control" placeholder="First Name" required>
											</div>
											<div class="col-sm-3">
												<label for="" class="form-label">Middle Name</label>
												<input type="text" name="mn" class="form-control" placeholder="Middle Name" required>
											</div>
											<div class="col-sm-3">
												<label for="" class="form-label">Last Name</label>
												<input type="text" name="ln" class="form-control" placeholder="Last Name" required>
											</div>
											<div class="col-sm-1">
												<label for="" class="form-label">Suffix</label>
												<input type="text" name="suffix" class="form-control" placeholder="Suffix">
											</div>
											<div class="col-4">
												<label for="" class="form-label">Upload Photo</label>
												<input type="file" name="photo" class="form-control" id="inputEmailAddress" placeholder="">
											</div>
											<div class="col-2">
                                            <label for="inputBirthday" class="form-label">Birthday</label>
                                            <div class="input-group">
                                            <input type="date" id="inputBirthday" name="bday" class="form-control border-end-0" value="" placeholder="" required>
                                            </div>
                                            </div>

                                            <div class="col-2">
                                            <label for="inputAge" class="form-label">Age</label>
                                            <div class="input-group">
                                            <input type="number" id="inputAge" name="age" class="form-control border-end-0" value="" placeholder="Age" required>
                                            </div>

                                            <script>
                                            function calculateAge() {
                                            const birthdayInput = document.getElementById('inputBirthday');
                                            const ageInput = document.getElementById('inputAge');

                                            const today = new Date();
                                            const birthDate = new Date(birthdayInput.value);

                                            let age = today.getFullYear() - birthDate.getFullYear();
                                            const monthDifference = today.getMonth() - birthDate.getMonth();

                                            if (monthDifference < 0 || (monthDifference === 0 && today.getDate() < birthDate.getDate())) {
                                          age--;
                                        }

                                          ageInput.value = age;
                                        }

                                         // Add an event listener to the birthday input to calculate the age whenever the date is changed
                                          document.getElementById('inputBirthday').addEventListener('change', calculateAge);
                                            </script>

									</div>
											<div class="col-2">
												<label for="" class="form-label">Gender</label>
												<label for="inputSelectCountry" class="form-label">Status</label>
												<select class="form-select" name="gender" aria-label="Default select example" required>
													<option selected></option>
													<option value="Male">Male</option>
													<option value="Female">Female</option>
												</select>
											</div>
											<div class="col-2">
											  <label for="" class="form-label">Marital Status</label>
												<select class="form-select" name="status" aria-label="Default select example" required>
													<option selected></option>
													<option value="Single">Single</option>
													<option value="Married">Married</option>
													<option value="Widowed">Widowed</option>
													<option value="Legally Seperated">Legally Seperated</option>
												</select>
											</div>
											<div class="col-3">
												<label for="" class="form-label">Contact #</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="cp1" class="form-control border-end-0" value="" placeholder="Contact #"> 
												</div>
											</div>
											<div class="col-6">
												<label for="" class="form-label">Address</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="address1" class="form-control border-end-0" value="" placeholder="Address" required> 
												</div>
											</div>
											<div class="col-3">
											<label for="" class="form-label">SELECT SCHOOL BRANCH</label>
											<select id ="group" class="form-control" name="branch" required>
								             <option value="">Select Branch</option>
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
											<div class="col-2">
												<label for="" class="form-label">Rate Per Hour</label>
												<select id = "group" class = "form-control" name = "rate" required>
								<option value = "">Rate</option>
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
													<button type="submit" name="save" class="btn btn-primary"><i class='bx bx-user'></i>SAVE LECTURER</button>
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
