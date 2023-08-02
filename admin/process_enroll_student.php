<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students Data</title>
    <!-- Add DataTables CSS and Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>List of Students</h2>
        <table id="studentsTable" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Student Number</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Suffix</th>
                    <th>Gender</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connect to the database
                include('connection.php');

                // Fetch students data from the database
                $sql = "SELECT * FROM es_students";
                $result = mysqli_query($conn, $sql);

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
            </tbody>
        </table>
    </div>

    <!-- Add DataTables JS and Bootstrap JS -->
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Initialize DataTables -->
    <script>
        $(document).ready(function() {
            $('#studentsTable').DataTable();
        });
    </script>
</body>

</html>
