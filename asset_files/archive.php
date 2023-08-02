<?php
include("./../connection.php");

// Query to get archived students
$sql_students = "SELECT es_students.*
                 FROM es_students
                 JOIN es_archive_students ON es_students.id = es_archive_students.id";

$query_students = mysqli_query($conn, $sql_students);

// Query to get archived lecturers
$sql_lecturers = "SELECT es_lecturers.*
                  FROM es_lecturers
                  JOIN es_archive_lecturers ON es_lecturers.id = es_archive_lecturers.id";

$query_lecturers = mysqli_query($conn, $sql_lecturers);
?>

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
    <title>Rocker - Free Bootstrap 5 Admin Dashboard Template</title>
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <div class="sidebar-wrapper" data-simplebar="true">
            <!-- header -->
            <?php include('../includes/logo.php'); ?>
            <!-- end header -->
            <!--navigation-->
            <?php include('../includes/admin_nav.php'); ?>
            <!--end navigation-->
        </div>
        <div class="page-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Archives</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Archive Table</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <!--end breadcrumb-->
                <h6 class="mb-0 text-uppercase">Archive</h6>
                <hr />
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Student</button>
                        <button class="nav-link" id="nav-Lecturer-tab" data-bs-toggle="tab" data-bs-target="#nav-Lecturer" type="button" role="tab" aria-controls="nav-Lecturer" aria-selected="false">Lecturer</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="studentTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID no.</th>
                                                <th>Student Name</th>
                                                <th>School Branch</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($query_students)) { ?>
                                                <tr>
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                                    <td><?php echo $row["school_branch"]; ?></td>
                                                    <td style="text-align:center;">
                                                        <a href="stud_restore.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-success btn-fw">
                                                            <i class="bx bx-zoom-in"></i> Restore
                                                        </a>
                                                        <a href="stud_delete.php?id=<?php echo $row['id']; ?>" class="btn btn-outline-danger btn-fw">
                                                            <i class="bx bx-trash"></i> Archive
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-Lecturer" role="tabpanel" aria-labelledby="nav-Lecturer-tab" tabindex="0">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="lecturerTable" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>ID no.</th>
                                                <th>Lecturer Name</th>
                                                <th>Educational Attainment</th>
                                                <th>School Branch</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php while ($row = mysqli_fetch_assoc($query_lecturers)) { ?>
                                                <tr>
                                                    <td><?php echo $row['lecturer_id']; ?></td>
                                                    <td><?php echo $row['firstname'] . " " . $row['lastname']; ?></td>
                                                    <td><?php echo $row['educational_attainment'] ?></td>
                                                    <td><?php echo $row["branch"] ?></td>
                                                    <td style="text-align:center;">
                                                        <a href="lecturer_restore.php?id=<?php echo $row['lecturer_id']; ?>" class="btn btn-inverse-warning btn-fw" style="color:green"><i class="bx bx-zoom-in"></i> Restore</a>
                                                        <a href="lecturer_delete.php?id=<?php echo $row['lecturer_id']; ?>" class="btn btn-inverse-danger btn-fw" style="color:red"><i class="bx bx-trash"></i> Archive</a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
            $('#studentTable').DataTable();
            $('#lecturerTable').DataTable();
        });
    </script>

    <!--app JS-->
    <script src="assets/js/app.js"></script>
</body>

</html>
