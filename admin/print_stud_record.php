<?php
    include('connection.php');
    $student_number = $_REQUEST['stud_number'];
    $query=mysqli_query($conn,"SELECT * FROM `es_students` WHERE student_number = '$student_number'");
    while($row=mysqli_fetch_array($query)){
    $student_number = $row['student_number']
?>

<div class="student-record" style="margin-top: 40px;">
    
    <div style="font-family: arial; display:flex; align-items: start; justify-content: space-evenly;">
        <div class="student-no" style="text-align: center;">
            <span>Student Number</span>
            <h3 style="font-weight:bold; font-size:3rem; margin: 16px 0 0;"><?php echo $row['student_number']; ?></h3>
        </div>
        <div class="logo-icon">
            <img src="images/logo.png" width="250">
        </div>
        <div class="student_img">
            <!--<img src="<?php echo $row['photo']; ?>"  alt="Profile Image" width="120" height="120"/>-->
            <img src="../assets/images/profile-img.png"  alt="Profile Image" width="120" height="120"/>
        </div>
    </div>


    <table border="0" style="width:750px; font-family: arial; margin: 0 auto; padding-top:20px;">

        <thead>
            <tr>
                <td colspan="2"><h1 style="text-align: center;">REGISTRATION FORM</h1></td>
            </tr>
            <tr>
                <td colspan="2"><h2>Personal Information:</h2></td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Lastname:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['lastname']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Firstname:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['firstname']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Middlename:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['middle_name']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Contact Number:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['cp_number']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Contact Number:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['cp_number']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Address:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['address']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">School:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['school']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Year Graduated:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['year_graduated']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Previous Review Center:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['prev_rev_center']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">No. of Times Taken:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['no_of_times_taken']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Sex:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['age']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Age:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['age']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Birthday:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['birthday']; ?></td>
            </tr>
            <tr>
                <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Status:</td>
                <td style="padding:5px 5px 7px;"><?php echo $row['marital_status']; ?></td>
            </tr>
            <tr>
                <td colspan="2" style="padding: 10px; border: solid 1px #FFEA00; border-radius: 15px; background-color: #ffea00c2; box-shadow: 5px 5px #d1caca;">
                    <table>
                        <tr>
                            <td colspan="2"><h2>INCASE OF EMERGENCY:</h2></td>
                        </tr>
                        <tr>
                            <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Name:</td>
                            <td style="padding:5px 5px 7px;"><?php echo $row['name_to_contact']; ?></td>
                        </tr>
                        <tr>
                            <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Relationship:</td>
                            <td style="padding:5px 5px 7px;"><?php echo $row['relationship']; ?></td>
                        </tr>    
                        <tr>
                            <td style="width: 30%; padding:5px 5px 7px; font-weight:bold;">Contact Number:</td>
                            <td style="padding:5px 5px 7px;"><?php echo $row['cp_number_of_cp']; ?></td>
                        </tr>                 
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="padding-top:30px;">
                    <?php
                    include('connection.php');
                    $student_number = $_REQUEST['stud_number'];
                    $query=mysqli_query($conn,"SELECT * FROM `es_payments` WHERE student_id = '$student_number'");
                    while($row=mysqli_fetch_array($query)){
                    $student_number = $row['student_id']
                    ?>
                    <table style="width: 100%; border-collapse:collapse; padding-top:30px; border: solid 1px #000;">
                        <tr>
                            <td colspan="2" style="border: solid 1px #000; text-align: center;"><h2 style="margin: 0;">Review Fee Assessment / Payment Record</h2></td>
                        </tr>

                        <tr>
                            <td style="border: solid 1px #000;margin-bottom:7px; font-weight:bold;text-align: center;">Date</td>
                            <td style="border: solid 1px #000;margin-bottom:7px; font-weight:bold;text-align: center;">Details</td>
                        </tr>

                        <tr>
                            <td style="width: 20%; border: solid 1px #000;margin-bottom:7px; font-weight:bold;text-align: center;">
                                <p><?php echo $row['or_date']; ?></p>
                            </td>                          
                            <td style="border: solid 1px #000;margin-bottom:7px;">
                                <p><span style="font-weight:bold;">PR #:</span> <?php echo $row['pr_number']; ?></p>
                                <p><span style="font-weight:bold;">Amount:</span> <?php echo $row['amount']; ?></p> 
                                <p><span style="font-weight:bold;">Downpayment:</span> <?php echo $row['downpayment']; ?></p>
                                <p><span style="font-weight:bold;">Balance:</span> <?php echo $row['balance']; ?></p>
                            </td>
                        </tr>
                    </table>

                    <?php
                        }   
                    ?>   
                </td>                
            </tr>
        </tbody>
    </table>

</div>

<?php } ?>