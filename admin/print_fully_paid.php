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
    <center>
        <div style="width:900px;">
        <img src="images/logo.png" width="250">
        <h3>LIST OF STUDENTS WITH FULLY PAID</h3><br>
		<table id="example" class="table table-striped table-bordered" style="width:100%">
								<thead>
									<tr>
										<th>Student #</th>
										<th>Student Name</th>
										<th>Review Program</th>
										<th>Down Payment</th>
										<th>OR Date</th>
										<th>Amount</th>
										<th>PR Number</th>
										<th>Balance</th>
										<th>Remark</th>
									</tr>
								</thead>
								<tbody>
								<?php
				include('connection.php');

				$query=mysqli_query($conn,"SELECT * FROM `es_payments` WHERE remarks = 'FULLY PAID' GROUP BY student_name");
				while($row=mysqli_fetch_array($query)){
					$student_number = $row['student_id']
					?>
					<tr>
                        <td><?php echo $row['student_id']; ?></td>
						<td><?php echo $row['student_name']; ?></td>
						<td><?php echo $row['review_program']; ?></td>
						<td><?php echo $row['downpayment']; ?></td>
                        <td><?php echo $row['or_date']; ?></td>
						<td><?php echo $row['amount']; ?></td>
						<td><?php echo $row['pr_number']; ?></td>
						<td><?php echo $row['balance']; ?></td>
						<td><?php echo $row['remarks']; ?></td>	
                    </tr>
					<?php
				}
                
			?>   
								</tbody>								
							</table>
        </div>
    </center>
</body>