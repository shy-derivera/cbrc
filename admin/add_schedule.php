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
					<div class="breadcrumb-title pe-3">Schedule</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Add Schedule</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						
					</div>
				</div>
				<!--end breadcrumb-->
				<h3 class="mb-0 text-uppercase">Add Schedule</h3>
				<hr/>
				
				<div class="form-body">
										<form method="POST" action="process_schedule.php" enctype="multipart/form-data" class="row g-3">
											<input type="hidden" name="lec_id" value="<?php echo $_REQUEST['lec_id']; ?>">
											<input type="hidden" name="lec_name" value="<?php echo htmlspecialchars($_POST['lec_name'] ?? ''); ?>">
<div class="col-sm-12">
    <label for="review_program" class="form-label">Subject</label>
    <select id="review_program" class="form-control" name="review_program" required>
        <option value="">Select Review Program</option>
        <?php
        include('connection.php');

        // Prepare and execute the SQL query
        $stmt = $conn->prepare("SELECT * FROM `es_review_programs` GROUP BY `program_code`");
        if ($stmt->execute()) {
            // Fetch the result as an associative array
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                ?>
                <option value="<?php echo htmlspecialchars($row['program_description']); ?>">
                    <?php echo htmlspecialchars($row['program_description'] . ' (' . $row['program_fee'] . ')'); ?>
                </option>
                <?php
            }
        } else {
            // Handle the case where the query execution failed
            echo "Error: " . $stmt->error;
        }
        // Close the prepared statement
        $stmt->close();
        $conn->close();
        ?>
    </select>
</div>

							</select>     
									        </div>
											<div class="col-sm-2">
											 <label for="">Day</label>
											 <select name="day" id="" class="form-control">
												<option value="Monday">Monday</option>
												<option value="Tuesday">Tuesday</option>
												<option value="Wednesday">Wednesday</option>
												<option value="Thursday">Thursday</option>
												<option value="Friday">Friday</option>
												<option value="Saturday">Saturday</option>
												<option value="Sunday">Sunday</option>
											 </select>
									        </div>
											<div class="col-sm-2">
											 <label for="">From</label>
											 <input type="time" name="from" class="form-control" >
									        </div>
											<div class="col-sm-2">
											 <label for="">To</label>
											 <input type="time" name="to" class="form-control" >
									        </div>
									        <div class="col-sm-4">
											<label for="">Select Branch</label>
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
											<label for="" class="form-label">SELECT SCHOOL BRANCH</label>
										
											<div class="col-12">
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