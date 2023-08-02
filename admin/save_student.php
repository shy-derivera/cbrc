<?php
// Ensure that the form data has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are present (you can add more validation as needed)
    if (isset($_POST['student_number']) && isset($_POST['fn']) && isset($_POST['mn']) && isset($_POST['ln']) && isset($_POST['gender'])) {
        // Get form data
        $student_number = $_POST['student_number'];
        $fn = $_POST['fn'];
        $mn = $_POST['mn'];
        $ln = $_POST['ln'];
        $suffix = $_POST['suffix'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $address = $_POST['address1'];
        $status = $_POST['status'];
        // Add more form data as needed

        // Insert the data into the database
        include('connection.php');

        $sql = "INSERT INTO es_students (student_number, lastname, firstname, middle_name, suffix, sex, age, address, status) VALUES ('$student_number', '$ln', '$fn', '$mn', '$suffix', '$gender', '$age', '$address', '$status')";

        if (mysqli_query($conn, $sql)) {
            // Student added successfully, you can redirect to a success page or do something else
            echo "Student added successfully!";
        } else {
            // Error in inserting student data
            echo "Error: " . mysqli_error($conn);
        }

        // Close the database connection
        mysqli_close($conn);
    } else {
        echo "Missing required fields.";
    }
}
?>
