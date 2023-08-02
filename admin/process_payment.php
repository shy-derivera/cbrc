<?php
// Assuming you have already established a database connection
include('connection.php');

// Function to sanitize user input (prevent SQL injection)
function sanitize($data)
{
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Check if the form has been submitted
if (isset($_POST['save'])) {
    // Sanitize and retrieve form data
    $student_number = sanitize($_POST['stud_number']);
    $review_program = sanitize($_POST['review_program']);
    $downpayment = sanitize($_POST['downpayment']);
    $or_date = sanitize($_POST['or_date']);
    $amount = sanitize($_POST['amount']);
    $pr = sanitize($_POST['pr']);
    $remarks = sanitize($_POST['remarks']);
    $balance = sanitize($_POST['balance']);

    // Insert the payment data into the database
    $sql = "INSERT INTO es_payments (student_id, review_program, downpayment, or_date, amount, pr_number, remarks, balance)
            VALUES ('$student_number', '$review_program', '$downpayment', '$or_date', '$amount', '$pr', '$remarks', '$balance')";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        // Payment data successfully inserted
        // Redirect or show a success message
        header("Location: success_page.php");
        exit();
    } else {
        // Error occurred while inserting data
        // You can handle the error as per your application's requirement
        echo "Error: " . mysqli_error($conn);
    }
}
?>
