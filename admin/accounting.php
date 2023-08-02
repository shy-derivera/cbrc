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
					<div class="breadcrumb-title pe-3">Report</div>
					<div class="ps-3">
						<nav aria-label="breadcrumb">
							<ol class="breadcrumb mb-0 p-0">
								<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
								</li>
								<li class="breadcrumb-item active" aria-current="page">Accounting Reports</li>
							</ol>
						</nav>
					</div>
					
				</div>
				<!--end breadcrumb-->
				<h6 class="mb-0 text-uppercase">Accounting Reports</h6>
				<hr/>
				<div class="ms-auto">
				    <div class="form-body">
						<form action="report.php" enctype="multipart/form-data" class="row g-3">
						<div class="col-2">
											<label for="" class="form-label">SCHOOL BRANCH</label>
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
							<div class="col-2">
								<label for="" class="form-label">From</label>
								<input type="date" name="from" class="form-control border-end-0" value=""> 
							</div>	
							<div class="col-2">
								<label for="" class="form-label">To</label>
								<input type="date" name="to" class="form-control border-end-0" value=""> 
							</div>	
							<div class="col-2">
											<label for="" class="form-label">SELECT PROGRAM</label>
											<select id ="group" class="form-control" name="program" required>
								             <option value="">Select Program</option>
								<?php
								    include('connection.php');
									$g_transaction = $conn->prepare("SELECT * FROM `es_review_programs` GROUP BY `program_description`");
									if($g_transaction->execute()){
										$g_result = $g_transaction->get_result();
									}
									while($f_gtransaction = $g_result->fetch_array()){
								?>
									<option value = "<?php echo $f_gtransaction['program_description']?>"><?php echo $f_gtransaction['program_description']?></option>
								<?php
										}
									$conn->close();	
								?>
							</select>     
						</div>	
						<div class="col-2">
						<button type="submit" name="save" class="btn btn-success" style="margin-top:28px;">PRINT REPORT</button>
						</div> 
					    </form>		
					</div>


				</div>
				<br>
				<div class="card">
					<div class="card-body">
						<div class="table-responsive">
							<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Student ID</th>
										<th>Name</th>
										<th>Branch</th>
										<th>Season</th>
										<th>Program</th>
										<th>Down Payment</th>
										<th>Amount</th>
									</tr>
								</thead>
								<tbody>
								<?php
				include('connection.php');

				$query=mysqli_query($conn,"SELECT * FROM `es_payments`");
				while($row=mysqli_fetch_array($query)){
					$id = $row['id'];
					?>
					<tr>
                        <td><?php echo $row['student_id']; ?></td>
						<td><?php echo $row['student_name']; ?></td>
						<td><?php echo $row['branch']; ?></td>
						<td><?php echo $row['season']; ?></td>
						<td><?php echo $row['review_program']; ?></td>
						<td><?php echo $row['downpayment']; ?></td>
						<td><?php echo $row['amount']; ?></td>		             
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