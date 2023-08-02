<?php
// Assuming you have already established a database connection
include('connection.php');

// Function to sanitize user input (prevent SQL injection)
function sanitize($data)
{
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Check if the student_id is provided in the URL or as a parameter
if (isset($_GET['student_id'])) {
    $student_id = sanitize($_GET['student_id']);

    // Query to fetch review_program, downpayment, and balance for the specific student_id
    $sql = "SELECT student_id, review_program, downpayment, balance
            FROM es_payments
            WHERE student_id = '$student_id'";

    // Execute the query
    $result = mysqli_query($conn, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the data from the result set
        $payment_details = mysqli_fetch_assoc($result);

        // Check if any data was found for the given student_id
        if ($payment_details) {
            // Display the payment details
            echo "Student ID: " . $payment_details['student_id'] . "<br>";
            echo "Review Program: " . $payment_details['review_program'] . "<br>";
            echo "Down Payment: " . $payment_details['downpayment'] . "<br>";
            echo "Balance: " . $payment_details['balance'] . "<br>";
        } else {
            // No data found for the given student_id
            echo "No payment details found for the specified student ID.";
        }
    } else {
        // Error occurred while executing the query
        echo "Error: " . mysqli_error($conn);
    }
}
?>
