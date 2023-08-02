
<?php
//Start session
session_start();
//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['user_username']) || (trim($_SESSION['user_username']) == '')) {
    header("location: ../index.php");
    exit();
}
$username  =$_SESSION['user_username'];
$fn        =$_SESSION['user_firstname'];
$mn        =$_SESSION['user_mn'];
$ln        =$_SESSION['user_lastname'];
$suffix    =$_SESSION['user_suffix'];
$photo     =$_SESSION['user_photo'];
$branch     =$_SESSION['user_branch'];
$account_type =$_SESSION['user_account_type'];
?>

