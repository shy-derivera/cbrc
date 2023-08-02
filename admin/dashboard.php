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
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
					<div class="col">
						<div class="card radius-10 border-primary border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total Enrolled Students</p>
										<h4 class="my-1 text-primary">
										<?php
				include('connection.php');

				$query=mysqli_query($conn,"SELECT * FROM `es_students` WHERE status='VERIFIED'");
          $rowcount=mysqli_num_rows($query);
          echo $rowcount;
					?>
										</h4>
									</div>
									<div class="text-success ms-auto font-35"><i class="bx bx-user-pin"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 border-success border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total Dropped Students</p>
										<h4 class="my-1 text-danger">
										<?php
				include('connection.php');

				$query=mysqli_query($conn,"SELECT * FROM `es_students` WHERE status='DROPPED'");
          $rowcount=mysqli_num_rows($query);
          echo $rowcount;
					?>
										</h4>
									</div>
									<div class="text-danger ms-auto font-35"><i class="bx bx-user-pin"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10  border-warning border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total Number of Lecturer</p>
										<h4 class="text-warning my-1">
										<?php
				include('connection.php');

				$query=mysqli_query($conn,"SELECT * FROM `es_lecturers` WHERE status='ACTIVE'");
          $rowcount=mysqli_num_rows($query);
          echo $rowcount;
					?>
										</h4>
									</div>
									<div class="text-warning ms-auto font-35"><i class="bx bx-user-pin"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col">
						<div class="card radius-10 border-danger border-start border-0 border-4">
							<div class="card-body">
								<div class="d-flex align-items-center">
									<div>
										<p class="mb-0">Total Number of Users</p>
										<h4 class="my-1 text-danger">
										<?php
				include('connection.php');

				$query=mysqli_query($conn,"SELECT * FROM `es_users` WHERE user_status='ACTIVE'");
          $rowcount=mysqli_num_rows($query);
          echo $rowcount;
					?>
										</h4>
									</div>
									<div class="text-primary ms-auto font-35"><i class="bx bx-user-pin"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div><!--end row-->

				
				

				 <div class="card radius-10">
                         <div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Recent Enrolled Students</h6>
								</div>
								<div class="dropdown ms-auto">
									<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
									</a>
									<ul class="dropdown-menu">
										<li><a class="dropdown-item" href="javascript:;">Action</a>
										</li>
										<li><a class="dropdown-item" href="javascript:;">Another action</a>
										</li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li><a class="dropdown-item" href="javascript:;">Something else here</a>
										</li>
									</ul>
								</div>
							</div>
						 <div class="table-responsive">
						   <table class="table align-middle mb-0">
							<thead class="table-light">
							 <tr>
    							<th>Student #</th>
							    <th>Lastname</th>
								<th>Middle Name</th>
								<th>Firstname</th>
								<th>Sex</th>
								<th>Age</th>
								<th>Address</th>
								<th>Status</th>
							 </tr>
							 </thead>
							 <tbody>
								<?php
				include('connection.php');

				$query=mysqli_query($conn,"SELECT * FROM `es_students` WHERE status = 'VERIFIED' ORDER BY id DESC LIMIT 10");
				while($row=mysqli_fetch_array($query)){
					$student_number = $row['student_number'];
					$name = $row['lastname'] . ', ' . $row['firstname'] . ' ' . $row['middle_name'] . ' ' . $row['suffix'];
					?>
					<tr>
                        <td><?php echo $row['student_number']; ?></td>
						            <td><?php echo $row['lastname']; ?></td>
												<td><?php echo $row['firstname']; ?></td>
												<td><?php echo $row['middle_name']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
												<td><?php echo $row['age']; ?></td>
												<td><?php echo $row['address']; ?></td>
												<td><?php echo $row['status']; ?></td>
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
</body>

</html>