<?php
	include("./../connection.php");
 	$sql = "SELECT *
   			FROM es_students
   			JOIN es_archive_students ON es_students.id = es_archive_students.id";

	$query = mysqli_query($conn, $sql);


   
?>
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
	<title>Rocker - Free Bootstrap 5 Admin Dashboard Template</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
        <div class="sidebar-wrapper" data-simplebar="true">
			<!-- header -->
			<?php include('../includes/logo.php'); ?>
			<!-- end header -->
			<!--navigation-->
			<?php include('../includes/admin_nav.php'); ?>
			<!--end navigation-->			
		</div>
		<div class="page-wrapper">
			<div class="page-content">

				<!--breadcrumb-->
				<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
					<div class="breadcrumb-title pe-3">Archives</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Archive Table</li>
							</ol>
						</nav>
					</div>
				</div>

				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Archive</h6>
				<hr/>
				<nav>
					<div class="nav nav-tabs" id="nav-tab" role="tablist">
						<button class="nav-link active" id="nav-student-tab" data-bs-toggle="tab" data-bs-target="#nav-student" type="button" role="tab" aria-controls="nav-student" aria-selected="true">Student</button>

						<button class="nav-link" id="nav-lecturer-tab" data-bs-toggle="tab" data-bs-target="#nav-lecturer" type="button" role="tab" aria-controls="nav-lecturer" aria-selected="false">Lecturers</button>	

						<button class="nav-link" id="nav-branch-tab" data-bs-toggle="tab" data-bs-target="#nav-branch" type="button" role="tab" aria-controls="nav-branch" aria-selected="false">Branch</button>

						<button class="nav-link" id="nav-announcements-tab" data-bs-toggle="tab" data-bs-target="#nav-announcements" type="button" role="tab" aria-controls="nav-announcements" aria-selected="false">Announcements</button>
					</div>
				</nav>

				<!--Student-->
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab" tabindex="0">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>ID no.</th>
												<th>Student Name</th>
						                        <th>School Branch</th>
												<th colspan="2" style="text-align:center;">Option</th>
											</tr>
										</thead>
										<tbody>
							                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
						                    <tr>
						                        <td><?php echo $row['id']; ?></td>
						                        <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
						                        <td><?php echo $row["school_branch"]?></td>
						                        <td style="text-align:center;"><a href="stud_restore.php?id=<?php echo $row['id'] ; ?> " class="btn btn-inverse-warning btn-fw" style="color:green"><i class="bx bx-zoom-in"></i>Restore</a> </td>
						                        <td style="text-align:center;"><a href="stud_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-inverse-danger btn-fw" style="color:red"><i class="bx bx-trash"></i>ARCHIEVE</a></td>
						                    </tr>
							                <?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="nav-lecturer" role="tabpanel" aria-labelledby="nav-lecturer-tab" tabindex="0">...</div>
						<div class="tab-pane fade" id="nav-branch" role="tabpanel" aria-labelledby="nav-branch-tab" tabindex="0">...</div>
						<div class="tab-pane fade" id="nav-announcements" role="tabpanel" aria-labelledby="nav-announcements-tab" tabindex="0">...</div>
					</div>
				</div>

				<!--Lecturer-->
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-lecturer" role="tabpanel" aria-labelledby="nav-lecturer-tab" tabindex="0">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>ID no.</th>
												<th>Student Name</th>
						                        <th>School Branch</th>
												<th colspan="2" style="text-align:center;">Option</th>
											</tr>
										</thead>
										<tbody>
							                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
						                    <tr>
						                        <td><?php echo $row['id']; ?></td>
						                        <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
						                        <td><?php echo $row["school_branch"]?></td>
						                        <td style="text-align:center;"><a href="stud_restore.php?id=<?php echo $row['id'] ; ?> " class="btn btn-inverse-warning btn-fw" style="color:green"><i class="bx bx-zoom-in"></i>Restore</a> </td>
						                        <td style="text-align:center;"><a href="stud_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-inverse-danger btn-fw" style="color:red"><i class="bx bx-trash"></i>ARCHIEVE</a></td>
						                    </tr>
							                <?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab" tabindex="0">...</div>
						<div class="tab-pane fade" id="nav-branch" role="tabpanel" aria-labelledby="nav-branch-tab" tabindex="0">...</div>
						<div class="tab-pane fade" id="nav-announcements" role="tabpanel" aria-labelledby="nav-announcements-tab" tabindex="0">...</div>
					</div>
				</div>

				<!--branch-->
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-branch" role="tabpanel" aria-labelledby="nav-branch-tab" tabindex="0">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>ID no.</th>
												<th>Student Name</th>
						                        <th>School Branch</th>
												<th colspan="2" style="text-align:center;">Option</th>
											</tr>
										</thead>
										<tbody>
							                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
						                    <tr>
						                        <td><?php echo $row['id']; ?></td>
						                        <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
						                        <td><?php echo $row["school_branch"]?></td>
						                        <td style="text-align:center;"><a href="stud_restore.php?id=<?php echo $row['id'] ; ?> " class="btn btn-inverse-warning btn-fw" style="color:green"><i class="bx bx-zoom-in"></i>Restore</a> </td>
						                        <td style="text-align:center;"><a href="stud_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-inverse-danger btn-fw" style="color:red"><i class="bx bx-trash"></i>ARCHIEVE</a></td>
						                    </tr>
							                <?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab" tabindex="0">...</div>
						<div class="tab-pane fade" id="nav-lecturer" role="tabpanel" aria-labelledby="nav-lecturer-tab" tabindex="0">...</div>
						<div class="tab-pane fade" id="nav-announcements" role="tabpanel" aria-labelledby="nav-announcements-tab" tabindex="0">...</div>
					</div>
				</div>

				<!--Annoucement-->
				<div class="tab-content" id="nav-tabContent">
					<div class="tab-pane fade show active" id="nav-announcements" role="tabpanel" aria-labelledby="nav-announcements-tab" tabindex="0">
						<div class="card">
							<div class="card-body">
								<div class="table-responsive">
									<table id="example" class="table table-striped table-bordered" style="width:100%">
										<thead>
											<tr>
												<th>ID no.</th>
												<th>Student Name</th>
						                        <th>School Branch</th>
												<th colspan="2" style="text-align:center;">Option</th>
											</tr>
										</thead>
										<tbody>
							                <?php while ($row = mysqli_fetch_assoc($query)) { ?>
						                    <tr>
						                        <td><?php echo $row['id']; ?></td>
						                        <td><?php echo $row['firstname']." ".$row['lastname']; ?></td>
						                        <td><?php echo $row["school_branch"]?></td>
						                        <td style="text-align:center;"><a href="stud_restore.php?id=<?php echo $row['id'] ; ?> " class="btn btn-inverse-warning btn-fw" style="color:green"><i class="bx bx-zoom-in"></i>Restore</a> </td>
						                        <td style="text-align:center;"><a href="stud_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-inverse-danger btn-fw" style="color:red"><i class="bx bx-trash"></i>ARCHIEVE</a></td>
						                    </tr>
							                <?php } ?>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="tab-pane fade" id="nav-student" role="tabpanel" aria-labelledby="nav-student-tab" tabindex="0">...</div>
						<div class="tab-pane fade" id="nav-branch" role="tabpanel" aria-labelledby="nav-branch-tab" tabindex="0">...</div>
						<div class="tab-pane fade" id="nav-announcements" role="tabpanel" aria-labelledby="nav-announcements-tab" tabindex="0">...</div>
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