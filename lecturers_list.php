<!doctype html>
<html lang="en" class="semi-dark">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
    <!--plugins-->
    <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
    <link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
    <link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
    <link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
    <!-- loader-->
    <link href="assets/css/pace.min.css" rel="stylesheet" />
    <script src="assets/js/pace.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/bootstrap-extended.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="assets/css/app.css" rel="stylesheet">
    <link href="assets/css/icons.css" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="assets/css/semi-dark.css" />
    <title>CBRC Enrollment System</title>
</head>

<body>
<?php
include('session.php');
include('connection.php');

// Fetch lecturers data from the database
$query = mysqli_query($conn, "SELECT * FROM es_lecturers");
?>

<!--wrapper-->
<div class="wrapper">
    <!--sidebar wrapper -->
    <div class="sidebar-wrapper" data-simplebar="true">
    <?php include('../includes/logo.php'); ?>
        <!--navigation-->
        <?php include('../includes/admin_nav.php'); ?>
        <!--end navigation-->
    </div>
    <!--end sidebar wrapper -->
    <!--start header -->
    <?php include('../includes/header.php'); ?>
    <!--end header -->
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Lecturer</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">List of Lecturers</li>
                        </ol>
                    </nav>
                </div>
                <div class="ms-auto">
                    <div class="btn-group">
                        <a href="add_lecturer.php" class="btn btn-success" style="margin-right:10px;">ADD NEW LECTURER</a>
                    </div>
                </div>
            </div>
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">List of Lecturers</h6>
            <hr/>
            <div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Lecturer ID</th>
                        <th>Lastname</th>
                        <th>Firstname</th>
                        <th>Middle Name</th>
                        <th>Sex</th>
                        <th>Age</th>
                        <th>Address</th>
                        <th style="text-align:center;">UPDATE</th>
                        <th style="text-align:center;">ARCHIVE</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include('connection.php');
                $query = mysqli_query($conn, "SELECT * FROM es_lecturers");

                while ($row = mysqli_fetch_assoc($query)) {
                    ?>
                    <tr>
                        <td><?php echo $row['lecturer_id']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['middle_name']; ?></td>
                        <td><?php echo $row['sex']; ?></td>
                        <td><?php echo $row['age']; ?></td>
                        <td><?php echo $row['address']; ?></td>
                        <td style="text-align:center;">
                            <a href="edit_lecturer.php?lec_id=<?php echo $row['id']; ?>" class="btn btn-inverse-warning btn-fw" style="color:orange"><i class="bx bx-edit"></i>UPDATE</a>
                        </td>
                        <td style="text-align:center;">
                            <a href="delete_lecturer.php?lec_id=<?php echo $row['id']; ?>" class="btn btn-inverse-danger btn-fw" style="color:red">
                                <i class="bx bx-trash"></i>ARCHIVE
                            </a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

    <!--end page wrapper -->
    <!--start overlay-->
    <div class="overlay toggle-icon"></div>
    <!--end overlay-->
    <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
    <!--End Back To Top Button-->
    <footer class="page-footer">
        <p class="mb-0">Copyright © 2021. All right reserved.</p>
    </footer>
</div>
<!--end wrapper-->

<!-- Bootstrap JS -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!--plugins-->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<!--app JS-->
<script src="assets/js/app.js"></script>
</body>

</html>
