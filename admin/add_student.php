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
										<form method="POST" action="process_enroll_student.php" enctype="multipart/form-data" class="row g-3">
										  <div class="col-sm-2">
										  <?php 
												include('connection.php');

												$query=mysqli_query($conn,"SELECT * FROM `es_students`");
												while($row=mysqli_fetch_array($query)){
													$student_number = $row['student_number'];
													$series = $student_number + 1;
												}
												?>
												<label for="" class="form-label">Student #</label>
												<input type="text" name="student_number" value="<?php echo str_pad($series, 6, '0', STR_PAD_LEFT); ?>" class="form-control" placeholder="Student #" required>
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
                                            </div>

											<div class="col-2">
												<label for="" class="form-label">Gender</label>
												
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
											<div class="col-4">
												<label for="" class="form-label">Contact #</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="cp1" class="form-control border-end-0" value="" placeholder="Contact #"> 
												</div>
											</div>
											<div class="col-8">
												<label for="" class="form-label">Address</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="address1" class="form-control border-end-0" value="" placeholder="Address" required> 
												</div>
											</div>
											<div class="col-4">
												<label for="i" class="form-label">School Graduated</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="school" class="form-control border-end-0" value="" placeholder="School Graduated" required> 
												</div>
											</div>
											<div class="col-2">
												<label for="" class="form-label">Year Graduated</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="year_graduated" class="form-control border-end-0" value="" placeholder="Year Graduated (ex: 2021)"> 
												</div>
											</div>
											<div class="col-4">
												<label for="" class="form-label">Previous Review Center</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="review_center" class="form-control border-end-0" value="" placeholder="Previous Review Center"> 
												</div>
											</div>
											<div class="col-2">
												<label for="" class="form-label">Number of times taken</label>
												<div class="input-group" id="show_hide_password">
													<input type="number" name="times_taken" class="form-control border-end-0" value="" placeholder="Number of times taken"> 
												</div>
											</div>
											<div class="col-6">
												<label for="" class="form-label">Contact person in case of emergency</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="contact_person" class="form-control border-end-0" value="" placeholder="Contact person in case of emergency" required> 
												</div>
											</div>
											<div class="col-3">
												<label for="" class="form-label">Relationship</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="relationship" class="form-control border-end-0" value="" placeholder="Relationship" required> 
												</div>
											</div>
											<div class="col-3">
												<label for="" class="form-label">Contact #</label>
												<div class="input-group" id="show_hide_password">
													<input type="text" name="cp2" class="form-control border-end-0" value="" placeholder="Contact #" required> 
												</div>
											</div>
                                            <div class="col-3">
												<label for="" class="form-label">Username</label>
												<input type="text" name="username" class="form-control" id="inputEmailAddress" placeholder="Username" required>
											</div>
											<div class="col-3">
												<label for="" class="form-label">Password</label>
												<div class="input-group" id="show_hide_password">
													<input type="password" name="password" class="form-control border-end-0" id="inputChoosePassword" value="" placeholder="Enter Password" required> <a href="javascript:;" class="input-group-text bg-transparent"><i class='bx bx-hide'></i></a>
												</div>
											</div>
											
											<div class="col-3">
					  		               </div>
											 <div class="col-3">
											<label for="" class="form-label">SELECT SCHOOL LOCATION</label>
											<select id="group" class="form-control" name="location" required>
								             <option value="">Select Location</option>
								<?php
								    include('connection.php');
									$g_transaction = $conn->prepare("SELECT * FROM `es_branch` GROUP BY `branch_group`");
									if($g_transaction->execute()){
										$g_result = $g_transaction->get_result();
									}
									while($f_gtransaction = $g_result->fetch_array()){
								?>
									<option value = "<?php echo $f_gtransaction['branch_group']?>"><?php echo $f_gtransaction['branch_group']?></option>
								<?php
										}
									$conn->close();	
								?>
							</select>     
											</div>
							<div class="col-3">
					  <label>SELECT BRANCH</label>
							<select id="branch" name="branch" class="form-control" disabled="disabled" required="required">
								<option value="">Select School Branch</option>
							</select>
					  </div>
											
											<div class="col-12">
											<div class="form-body">
  <form id="studentForm" method="POST" action="process_enroll_student.php" enctype="multipart/form-data" class="row g-3">
    <!-- Your form fields and input elements here... -->
    <div class="col-12">
      <div class="d-grid">
        <button type="submit" name="save" class="btn btn-primary"><i class='bx bx-user'></i>SAVE AND PROCEED TO PAYMENT</button>
      </div>
    </div>
  </form>
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
	<script>
  $(document).ready(function() {
    // Get the form element by ID
    const studentForm = document.getElementById('studentForm');

    // Listen for the form submission event
    studentForm.addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent the default form submission behavior

      // Serialize form data to send via AJAX
      const formData = new FormData(studentForm);

      // Make an AJAX request to submit the form data
      $.ajax({
        type: 'POST',
        url: studentForm.action,
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          // Handle the success response if needed
          alert('Student information saved successfully!');
        },
        error: function(xhr, status, error) {
          // Handle errors if needed
          alert('An error occurred while saving student information.');
        }
      });
    });
  });
	// get the date input element
const dateInput = document.querySelector('input[type="date"][name="bday"]');

// get the age input element
const ageInput = document.querySelector('input[type="number"][name="age"]');

// listen for changes in the date input
dateInput.addEventListener('change', () => {
  // get the date value from the input field
  const dateString = dateInput.value;
  
  // compute the age based on the date
  const birthdate = new Date(dateString);
  const age = Math.floor((new Date() - birthdate) / (365.25 * 24 * 60 * 60 * 1000));
  
  // update the age input field
  ageInput.value = age;
  
  // check if age is below 18 years old
  if (age < 18) {
    // prompt the user to confirm if they are 18 years or older
    const confirmMessage = "You must be 18 years or older to enroll. Are you 18 years or older?";
    if (!confirm(confirmMessage)) {
      // clear the age input field if the user is not 18 years or older
      ageInput.value = "";
    }
  }
});
<script src="assets/js/jquery-3.1.1.js"></script>
    <script type="text/javascript">
	$(document).ready(function(){
		$('#group').on('change', function(){
				if($('#group').val() == ""){
					$('#branch').empty();
					$('<option value = "">Select School Branch</option>').appendTo('#branch');
					$('#branch').attr('disabled', 'disabled');
				}else{
					$('#branch').removeAttr('disabled', 'disabled');
					$('#branch').load('get_branch.php?branch_group=' + $('#group').val());
				}
		});
	});
   </script>

<script type="text/javascript">
	$(document).ready(function(){
		$('#group1').on('change', function(){
				if($('#group1').val() == ""){
					$('#branch1').empty();
					$('<option value = "">Select RP</option>').appendTo('#branch1');
					$('#branch1').attr('disabled', 'disabled');
				}else{
					$('#branch1').removeAttr('disabled', 'disabled');
					$('#branch1').load('get_rp.php?program_group=' + $('#group1').val());
				}
		});
	});
   </script>

	</script>
</body>

</html>