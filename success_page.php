<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="assets/css/semi-dark.css" />
    <title>Payment Success</title>
</head>

<body>
    <!-- Page content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body">
                        <h3 class="mb-4">Payment Successful!</h3>
                        <p>Your payment has been processed successfully. Thank you for your payment!</p>
                        <p>Here are the payment details:</p>
                        <ul>
                            <li><strong>Student Number:</strong> <?php echo $_POST['student_number'] ?? 'Not provided'; ?></li>
                            <li><strong>Review Program:</strong> <?php echo $_POST['review_program'] ?? 'Not provided'; ?></li>
                            <li><strong>Down Payment:</strong> <?php echo $_POST['downpayment'] ?? 'Not provided'; ?></li>
                            <li><strong>OR Date:</strong> <?php echo $_POST['or_date'] ?? 'Not provided'; ?></li>
                            <li><strong>Amount:</strong> <?php echo $_POST['amount'] ?? 'Not provided'; ?></li>
                            <li><strong>PR #:</strong> <?php echo $_POST['pr'] ?? 'Not provided'; ?></li>
                            <li><strong>Balance:</strong> <?php echo $_POST['balance'] ?? 'Not provided'; ?></li>
                            <li><strong>Remarks:</strong> <?php echo $_POST['remarks'] ?? 'Not provided'; ?></li>
                        </ul>
                        <a href="./../signup.php" class="btn btn-primary">Back to Home</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page content -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
