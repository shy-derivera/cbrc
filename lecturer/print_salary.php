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
    <center>
        <div style="width:900px;">
        <br>
        <h3>LECTURER'S SALARY REPORT</h3><br>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
									<th>Lecturer Number</th>
										<th>Name</th>
										<th>Salary for the Month</th>
										<th>For the Year</th>
										<th>Hours</th>
										<th>Total Salary</th>
									</tr>
								</thead>
								<tbody>
								<?php
				include('connection.php');
                $name = $ln . ', ' . $fn . ' ' . $mn . ' ' . $suffix;
				$query=mysqli_query($conn,"SELECT * FROM `es_salary` WHERE lecturer_name = '$name'");
				while($row=mysqli_fetch_array($query)){
					$lecturer_id = $row['lecturer_id']
					?>
					<tr>
                        <td><?php echo $row['lecturer_id']; ?></td>
						<td><?php echo $row['lecturer_name']; ?></td>
						<td><?php echo $row['month']; ?></td>
						<td><?php echo $row['year']; ?></td>
						<td><?php echo $row['hours']; ?></td>
						<td style="text-align:right; font-weight:bold; font-size:18px;"><?php echo $row['total_salary']; ?></td>
           	             
                    </tr>
					<?php
				}
                
			?>   
								</tbody>							
							</table>

							<table id="example" class="table table-striped table-bordered" style="width:100%; text-align:right; font-size:18px; font-weight:bold;">
								
									<tr>
									<td>Grand Total</td>
                                    <td>
									<?php
				include('connection.php');
                $name = $ln . ', ' . $fn . ' ' . $mn . ' ' . $suffix;
				$query=mysqli_query($conn,"SELECT SUM(total_salary) as total FROM `es_salary` WHERE lecturer_name = '$name'");
				while($row=mysqli_fetch_array($query)){
					
					?>
					
                        <?php echo $row['total']; ?>
           	             
        
					<?php
				}
                
			?>   
									</td>
									</tr>						
							</table>
        </div>
    </center>
</body>