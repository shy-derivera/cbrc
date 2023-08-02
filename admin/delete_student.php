<?php
    
    $stud_num = $_GET['student_id'];

    
    include('connection.php');

    
    $sql = "INSERT INTO `es_archive_students` (id) VALUES ('$stud_num') ";

mysqli_query($conn, $sql);

   


    
    
    header('location: student_list.php');
    exit;
?>