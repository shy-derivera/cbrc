<?php
include "./../connection.php";
$id = $_GET['id'];
$sql = "DELETE FROM es_students WHERE id='$id' ";

$query = mysqli_query($conn, $sql);

header("location: archive.php");
?>