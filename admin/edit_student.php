<?php
include ("connection.php");
$g = $_GET["stud_num"];
$sql = "UPDATE es_students SET `status`='VERIFIED' WHERE student_number='$g'";
mysqli_query($conn, $sql);

echo "<script>window.location.href='student_list.php'</script>";
?>
