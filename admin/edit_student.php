<?php
include ("connection.php");
$g = $_GET["id"];
$sql = "UPDATE es_students SET `status`='VERIFIED' WHERE student_numer='$g'";
mysqli_query($conn, $sql);

echo "<script>window.location.href='dashboard.php'</script>";
?>