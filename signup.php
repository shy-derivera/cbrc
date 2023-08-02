<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link
      href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css"
      rel="stylesheet"
    />
    <link
      href="assets/plugins/metismenu/css/metisMenu.min.css"
      rel="stylesheet"
    />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap"
      rel="stylesheet"
    />
    <link href="assets/css/app.css" rel="stylesheet" />
    <link href="assets/css/icons.css" rel="stylesheet" />
    <title>CBRC Enrollment System</title>
  </head>

  <body style="background-color: #f2f2f2">
    <!--wrapper-->
    <div class="wrapper">
      <div
        class="d-flex align-items-center justify-content-center my-5 my-lg-0"
      >
        <div class="container">
          <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-2">
            <div class="col mx-auto" style="width: 100%">
              <div class="my-4 text-center">
                <img src="includes/images/logo.png" width="350" alt="" />
              </div>
              <div class="card">
                <div class="card-body">
                  <div class="border p-4 rounded">
                    <div class="text-center">
                      <h3 class="">Sign Up</h3>
                      <p>
                        Already have an account?
                        <a href="index.php">Sign in here</a>
                      </p>
                    </div>

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
												<input type="text" name="student_number" class="form-control" placeholder="Student #" 
												value="<?php echo str_pad($series, 6, '0', STR_PAD_LEFT); ?>" required>
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
												<label for="" class="form-label">Birthday</label>
												<div class="input-group" id="show_hide_password">
													<input type="date" name="bday" class="form-control border-end-0" value="" placeholder="" required> 
												</div>
											</div>
											<div class="col-2">
												<label for="" class="form-label">Age</label>
												<div class="input-group" id="show_hide_password">
													<input type="number" name="age" class="form-control border-end-0" value="" placeholder="Age" required> 
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
										
					  <hr><h3>Payment Info</h3>
                      <div class="col-4">
												<label for="" class="form-label">Upload Receipt</label>
												<input type="file" name="receipt" class="form-control" id="inputEmailAddress" placeholder="">
					  </div>
					  <div class="col-4">
											<label for="" class="form-label">SELECT SEASON</label>
											<select id="group1" class="form-control" name="season" required>
								             <option value="">Select Season</option>
								<?php
								    include('connection.php');
									$g_transaction = $conn->prepare("SELECT * FROM `es_review_programs` GROUP BY `program_group`");
									if($g_transaction->execute()){
										$g_result = $g_transaction->get_result();
									}
									while($f_gtransaction = $g_result->fetch_array()){
								?>
									<option value = "<?php echo $f_gtransaction['program_group']?>"><?php echo $f_gtransaction['program_group']?></option>
								<?php
										}
									$conn->close();	
								?>
							</select>     
											</div>
							<div class="col-4">
					  <label>SELECT REVIEW PROGRAM</label>
					  <select id="branch1" name="rp" class="form-control" disabled="disabled" required="required">
								<option value="">Select Review Program</option>
							</select>
					  </div>
                      
                      <div class="col-sm-2">
												<label for="" class="form-label">Down Payment</label>
												<select name="downpayment" id="" class="form-control">
													<option>Down Payment</option>
													<option>50% of Review Fee</option>
													<option>65% of Review Fee</option>
													<option>80% of Review Fee</option>
													<option>Full Payment</option>
												</select>
											</div>	
											<div class="col-sm-2">
												<label for="">Amount</label>
												<input type="number" name="amount" class="form-control" required>
									    </div>
                      <div class="col-sm-2">
												<label for="">Remarks</label>
												<select name="remarks" id="" class="form-control">
													<option value="PARTIAL">PARTIAL</option>
													<option value="FULLY PAID">FULLY PAID</option>
												</select>
												
									        </div>
											<!--<div class="gcash-btn col-sm-4">
													<div class="d-grid">
														<button type="submit" class="btn btn-primary" style=color:white><i class=''><a href="./asset_files/gcash-payment.html"  style=color:white>Add Gcash Payment</a></i></button>
													</div>
												</div>-->
												
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" name="save" class="btn btn-primary"><i class='bx bx-user'></i>SAVE</button>
												</div>
												
											</div>
								</form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!--end row-->
        </div>
      </div>
    </div>
	<script>
		 function saveToSession() {
        var downpayment = $("#downpayment").val();
        var amount = $("#amount").val();
        var remarks = $("#remarks").val();

        sessionStorage.setItem("downpayment", downpayment);
        sessionStorage.setItem("amount", amount);
        sessionStorage.setItem("remarks", remarks);
    }

    // Save data on change of form elements
    $(document).ready(function() {
        $("#downpayment, #amount, #remarks").change(function() {
            saveToSession();
        });
    });
	</script>
    <!--end wrapper-->
	<!--DYNAMIC SELECT-->
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
    <!--END DYNAMIC SELECT -->

    <!-- Bootstrap JS -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!--plugins-->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
    <script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
    <script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
    <!--Password show & hide js -->
    <script>
      $(document).ready(function () {
        $("#show_hide_password a").on("click", function (event) {
          event.preventDefault();
          if ($("#show_hide_password input").attr("type") == "text") {
            $("#show_hide_password input").attr("type", "password");
            $("#show_hide_password i").addClass("bx-hide");
            $("#show_hide_password i").removeClass("bx-show");
          } else if (
            $("#show_hide_password input").attr("type") == "password"
          ) {
            $("#show_hide_password input").attr("type", "text");
            $("#show_hide_password i").removeClass("bx-hide");
            $("#show_hide_password i").addClass("bx-show");
          }
        });
      });
    </script>
    <!--app JS-->
    <script src="assets/js/app.js"></script>

	<script>
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

	</script>
  </body>
</html>
