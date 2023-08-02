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
	<script src="assets/js/pace.min.js" defer></script>
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
	<?php include('session.php'); ?>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
			<?php include('./includes/logo.php'); ?>
			<!--navigation-->
			<?php include('./includes/admin_nav.php'); ?>
			<!--end navigation-->
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?php include('./includes/header.php'); ?>
		<!--end header -->
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Payment</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Payment</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">

					</div>
				</div>
				<!--end breadcrumb-->
				<h3 class="mb-0 text-uppercase">Add Payment</h3>
				<hr />

				<div class="form-body">
					<form method="POST" action="process_add_payment.php" enctype="multipart/form-data" class="row g-3">
						<input type="hidden" name="stud_number" value="<?php echo htmlspecialchars($REQUEST['stud_number']); ?>">
						<input type="hidden" name="stud_name" value="<?php echo htmlspecialchars($REQUEST['stud_name']); ?>">
						<input type="hidden" name="branch" value="<?php echo htmlspecialchars($REQUEST['branch']); ?>">
						<div class="col-sm-6">
							<label for="" class="form-label">REVIEW PROGRAM TO ENROLL</label>
							<select id="group" class="form-control" name="review_program" required>
								<option value="">Select Review Program</option>
								<?php
								include('connection.php');
								$g_transaction = $conn->prepare("SELECT * FROM `es_review_programs` GROUP BY `program_code`");
								if ($g_transaction->execute()) {
									$g_result = $g_transaction->get_result();
								}
								while ($f_gtransaction = $g_result->fetch_array()) {
								?>
									<option value="<?php echo htmlspecialchars($f_gtransaction['program_description']) ?>"><?php echo htmlspecialchars($f_gtransaction['program_description'] . ' (' . $f_gtransaction['program_fee'] . ')') ?></option>
								<?php
								}
								$conn->close();
								?>
							</select>
						</div>
						<div class="col-sm-6">
							<label for="" class="form-label">Down Payment</label>
							<select name="downpayment" id="" class="form-control">
								<option>Down Payment (2,000Php)</option>
								<option>50% of Review Fee</option>
								<option>65% of Review Fee</option>
								<option>80% of Review Fee</option>
								<option>Full Payment</option>
							</select>
						</div>

						<div class="col-sm-2">
							<label for="">OR Date</label>
							<input type="date" name="or_date" class="form-control" required>
						</div>
						<div class="col-sm-2">
							<label for="">Amount</label>
							<input type="number" name="amount" class="form-control" required>
						</div>
						<div class="col-sm-3">
							<label for="">PR #</label>
							<input type="text" name="pr" class="form-control">
						</div>
						<div class="col-sm-3">
							<label for="">Balance</label>
							<input type="number" name="balance" class="form-control" required>
						</div>
						<div class="col-sm-2">
							<label for="">Remarks</label>
							<select name="remarks" id="" class="form-control">
								<option value="PARTIAL">PARTIAL</option>
								<option value="FULLY PAID">FULLY PAID</option>
							</select>
						</div>
						<div class="col-sm-7">
						</div>
						<div class="col-10">
						</div>
						<div class="col-2">
							<div class="d-grid">
								<button type="submit" name="save" class="btn btn-primary"><i class='bx bx-save'></i>SAVE</button>
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
		<!--Start Back To Top Button-->
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
		<footer class="page-footer">
			<p class="mb-0">Copyright © 2021. All right reserved.</p>
		</footer>
	</div>
	<!--end wrapper-->

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js" defer></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js" defer></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js" defer></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js" defer></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js" defer></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js" defer></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js" defer></script>
	<script>
		$(document).ready(function() {
			$('#example').DataTable();
		});
	</script>

<script>
  // Function to validate the form before submission
  function validateForm() {
    // Get the values of the OR Date and Amount fields
    var orDate = document.getElementById("or_date").value;
    var amount = document.getElementById("amount").value;

    // Simple validation: Check if both fields are not empty
    if (orDate === "" || amount === "") {
      alert("Please fill in all required fields.");
      return false; // Prevent form submission
    }

    // Additional validation can be added here based on your requirements

    // If everything is valid, allow form submission
    return true;
  }

  // Add an event listener to the form submit button
  var form = document.querySelector("form");
  form.addEventListener("submit", function(event) {
    // Call the validateForm function before form submission
    if (!validateForm()) {
      event.preventDefault(); // Prevent form submission if validation fails
    }
  });
</script>

	<!--app JS-->
	<script src="assets/js/app.js" defer></script>
</body>

</html>
