<?php
include('connection.php');

if (isset($_GET['program_id']) && is_numeric($_GET['program_id'])) {
    $program_id = $_GET['program_id'];

    // Retrieve the program information from es_programs table
    $sql_get_program = "SELECT * FROM es_programs WHERE program_id = $program_id";
    $query_get_program = mysqli_query($conn, $sql_get_program);

    if (mysqli_num_rows($query_get_program) > 0) {
        $program_data = mysqli_fetch_assoc($query_get_program);

        // Insert the program into the es_archive_programs table
        $sql_archive_program = "INSERT INTO es_archive_programs (program_id, program_name, program_description, program_duration)
                                VALUES ('$program_data[program_id]', '$program_data[program_name]', '$program_data[program_description]', '$program_data[program_duration]')";
        $query_archive_program = mysqli_query($conn, $sql_archive_program);

        if ($query_archive_program) {
            // Deletion from es_programs table
            $sql_delete_program = "DELETE FROM es_programs WHERE program_id = $program_id";
            $query_delete_program = mysqli_query($conn, $sql_delete_program);

            if ($query_delete_program) {
                // Redirect to the review_programs.php page after successful archive and deletion
                header('Location: review_programs.php');
                exit;
            } else {
                // Error occurred during deletion from es_programs table
                // Handle the error (e.g., display an error message)
                echo "Error deleting program from es_programs table.";
            }
        } else {
            // Error occurred during archiving
            // Handle the error (e.g., display an error message)
            echo "Error archiving program.";
        }
    } else {
        // Program not found in es_programs table
        // Handle the error (e.g., display an error message)
        echo "Program not found.";
    }
} else {
    // Invalid or missing program ID parameter in the URL
    // Handle the error (e.g., display an error message)
    echo "Invalid program ID.";
}
?>
