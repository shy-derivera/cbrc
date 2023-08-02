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
			<?php include('../includes/stud_nav.php'); ?>
			<!--end navigation-->			
		</div>
		<!--end sidebar wrapper -->
		<!--start header -->
		<?php include('../includes/stud_header.php'); ?>
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
								<li class="breadcrumb-item active" aria-current="page">Lecturer's Schedule</li>
							</ol>
						</nav>
					</div>
					<div class="ms-auto">
						<div class="btn-group">
					
						</div>
					</div>
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">View Schedule</h6>
				<hr/>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Lecturer Number</th>
										<th>Name</th>
										<th>Review Program (Subject)</th>
										<th>Day</th>
										<th>Time</th>
									</tr>
								</thead>
								<tbody>
<?php
    // Ensure that $name and $branch are properly sanitized or validated before using them in SQL queries
    // For demonstration purposes, I'll assume that they are already validated.

    // Include the database connection file
    include('connection.php');

    // Define and initialize the $name and $branch variables
    $name = $ln . ', ' . $fn . ' ' . $mn . ' ' . $suffix;
    $rp = null; // Initialize $rp to avoid potential issues later

    // Retrieve review_program from the es_payments table based on the provided $name
    $query1 = mysqli_query($conn, "SELECT * FROM `es_payments` WHERE student_name LIKE '%$name%'");
    while ($row1 = mysqli_fetch_array($query1)) {
        $rp = $row1['review_program'];
        // If there are multiple rows with different review_programs for the same student, the last one will be used.
    }

    // If review_program is found, retrieve schedule data from the es_schedule table based on $branch and $rp
    if ($rp !== null) {
        $query = mysqli_query($conn, "SELECT * FROM `es_schedule` WHERE branch = '$branch' AND review_program = '$rp'");
        while ($row = mysqli_fetch_array($query)) {
            // Assuming there is no issue with the data, you can directly use $row['lecturer_id'] and other fields.
            $lecturer_id = $row['lecturer_id'];
?>
            <tr>
                <td><?php echo $row['lecturer_id']; ?></td>
                <td><?php echo $row['lecturer_name']; ?></td>
                <td><?php echo $row['review_program']; ?></td>
                <td><?php echo $row['day']; ?></td>
                <td style="font-weight:bold;"><?php echo date("h:i A", strtotime($row['time_from'])) . ' - ' . date("h:i A", strtotime($row['time_to'])); ?></td>
            </tr>
<?php
        }
    } else {
        // If review_program is not found, you can display an appropriate message here.
        // For example: echo "<tr><td colspan='5'>No schedule found for the provided name and branch.</td></tr>";
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