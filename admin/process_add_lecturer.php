<?php
    include('connection.php');
    include('session.php');

    if (isset($_POST['save'])) {
        $image_name = $_FILES['photo']['name'];
        $image_temp = $_FILES['photo']['tmp_name'];
        $exp = explode(".", $image_name);
        $end = end($exp);
        $name = time() . "." . $end;
        $path = "upload/" . $name;
        $allowed_ext = array("gif", "jpg", "jpeg", "png");

        $a = $_POST['lecturer_id'];
        $b = $_POST['fn'];
        $c = $_POST['mn'];
        $d = $_POST['ln'];
        $e = $_POST['suffix'];
        $f = $_POST['bday'];
        $g = $_POST['age'];
        $h = $_POST['gender'];
        $i = $_POST['status'];
        $j = $_POST['cp1'];
        $k = $_POST['address1'];
        $p = $_POST['rate'];
        $q = $_POST['branch'];

        if (in_array($end, $allowed_ext)) {
            if (move_uploaded_file($image_temp, $path)) {
                mysqli_query($conn, "INSERT INTO your_table_name (lecturer_id, firstname, middle_name, lastname, suffix, birthday, age, sex, marital_status, contact_number, address, rate_per_hour, branch, status)
VALUES ('$a', '$b', '$c', '$d', '$e', '$f', '$g', '$h', '$i', '$j', '$k', '$p', '$q', 'ACTIVE');
");

                mysqli_query($conn, "INSERT INTO `es_users` VALUES('', '$b', '$c', '$d', '$e', '$b', '$d', '$path', 'LECTURER', '$q', 'ACTIVE')");

                echo "<script>alert('New Lecturer has been successfully added.')</script>";
                header("location: lecturers_list.php");
            }
        } else {
            echo "<script>alert('Please upload an image only.')</script>";
        }
    }
?>
<!doctype html>
<html lang="en">

<head>
    <!-- ... Head content (title, meta tags, stylesheets, etc.) ... -->
</head>

<body>
    <!-- ... Your HTML content, including the form for lecturer details ... -->
    <form method="post" enctype="multipart/form-data">
        <!-- ... Input fields for lecturer details ... -->
        <input type="file" name="photo">
        <button type="submit" name="save">Save</button>
    </form>
    <!-- ... Other HTML content ... -->
</body>

</html>
