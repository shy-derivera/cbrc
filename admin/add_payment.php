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
				<hr/>
				
				<div class="form-body">
										<form method="POST" action="process_payment.php" enctype="multipart/form-data" class="row g-3">
											<input type="hidden" name="stud_number" value="<?php echo $_REQUEST['stud_number']; ?>">
                                            <input type="hidden" name="stud_name" value="<?php echo $_REQUEST['stud_name']; ?>">
											<div class="col-sm-6">
												<label for="">Review Program</label>
												<input type="text" name="review_program" class="form-control" 
												value="<?php
				include('connection.php');

				$student_number = $_REQUEST['stud_number'];

				$query=mysqli_query($conn,"SELECT * FROM `es_payments` WHERE student_id = '$student_number'");
				while($row=mysqli_fetch_array($query)){
					$student_number = $row['student_id'];
					$rp = $row['review_program'];
					echo $rp;
				       }
					?>     
					" required readonly>
									        </div>
											<div class="col-sm-6">
												<label for="">Down Payment</label>
												<input type="text" name="downpayment" class="form-control" 
												value="<?php
				include('connection.php');

				$student_number = $_REQUEST['stud_number'];

				$query=mysqli_query($conn,"SELECT * FROM `es_payments` WHERE student_id = '$student_number'");
				while($row=mysqli_fetch_array($query)){
					$student_number = $row['student_id'];
					$dp = $row['downpayment'];
					echo $dp;
				       }
					?>     
					" required>
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
												<input type="text" name="balance" class="form-control" 
												value="<?php
				include('connection.php');

				$student_number = $_REQUEST['stud_number'];

				$query=mysqli_query($conn,"SELECT * FROM `es_payments` WHERE student_id = '$student_number'");
				while($row=mysqli_fetch_array($query)){
					$student_number = $row['student_id'];
					$balance = $row['balance'];
					echo $balance;
				       }
					?>     
					" required readonly>
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