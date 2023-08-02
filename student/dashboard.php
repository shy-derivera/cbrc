<!doctype html>
<html lang="en" class="semi-dark">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
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
			<!-- header -->
			<?php include('../includes/logo.php'); ?>
			<!-- end header -->
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
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
					
					<div class="col">
						<div class="card radius-10 border-success border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Balance</p>
										<h4 class="my-1 text-success">
										<?php
											include('connection.php');

											$query = mysqli_query($conn, "SELECT * FROM `es_payments` WHERE remarks='PARTIAL' AND student_name LIKE '%$name%'");
											while ($row = mysqli_fetch_array($query)) {
												$student_number = $row['student_id'];
												echo $row['balance'];
											}
										?>
										</h4>
									</div>
									<div class="text-success ms-auto font-35"><i class="bx bx-dollar"></i></div>
								</div>
							</div>
						</div>
					</div>
					
				</div><!--end row-->

				 <div class="card radius-10">
                         <div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">My Class Schedule</h6>
								</div>
							</div>
						 <div class="table-responsive">
						 <table id="scheduleTable" class="table table-striped table-bordered" style="width:100%">
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
    include('connection.php');

    $name = $ln . ', ' . $fn . ' ' . $mn . ' ' . $suffix;
    $rp = ""; // Initialize $rp to an empty string to avoid undefined variable error

    $query1 = mysqli_query($conn, "SELECT * FROM `es_payments` WHERE student_name LIKE '%$name%'");
    while ($row1 = mysqli_fetch_array($query1)) {
        $rp = $row1['review_program'];
        break; // Only need the first result, so break out of the loop after getting the value
    }

    // Check if $rp is not empty before executing the next query
    if (!empty($rp)) {
        $query = mysqli_query($conn, "SELECT * FROM `es_schedule` WHERE branch = '$branch' AND review_program = '$rp'");
        while ($row = mysqli_fetch_array($query)) {
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
        echo "No review program found for the student.";
    }
?>

								</tbody>								
							</table>
						  </div>
						 </div>
					  </div>

			
					  
					  <div class="card radius-10">
                         <div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Announcements</h6>
								</div>
							</div>
						 <div class="table-responsive">
						 <table id="announcementTable" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Title</th>
										<th>Description</th>
										<th>Date Posted</th>
										<th>Who can View?</th>
									</tr>
								</thead>
								<tbody>
								<?php
									include('connection.php');

									$query = mysqli_query($conn, "SELECT * FROM `es_branch_announcement` where view_group = '$account_type'");
									while ($row = mysqli_fetch_array($query)) {
										$id = $row['id'];
										?>
										<tr>
											<td><?php echo $row['title']; ?></td>
											<td><?php echo $row['body']; ?></td>
											<td><?php echo $row['date_posted']; ?></td>
											<td><?php echo $row['view_group']; ?></td>
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
		<!--Start Back To Top Button-->
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
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
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/Chart.min.js"></script>
	<script src="assets/js/index.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		$(document).ready(function() {
			// Initialize DataTable for the schedule table
			$('#scheduleTable').DataTable();
			// Initialize DataTable for the announcement table
			$('#announcementTable').DataTable();
		});
	</script>
</body>
</html>
