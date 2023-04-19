<?php
$reqFor = "add";
include("../database.php");
include("./helper/authorization.php");

if (isset($_SESSION["studentUserId"]) && $access == 1) {
    $updateSuccess = 0;
    $updateFailure = 0;
    $id_number = "";
    $department = "";
    $fname = "";
    $lname = "";
    $mname = "";
    $mobile = "";
    $semail = "";
    $gender = "";
    $linkedin_url = "";
    $dob = "";
    $enro = "";
    $category = "";
    $pgoal = "";
    $pplotno = "";
    $pcity = "";
    $ppin    = "";
    $pdistrict    = "";
    $pstate = "";
    $pcountry = "";
    $splotno = "";
    $scity = "";
    $spin = "";
    $sdistrict = "";
    $sstate = "";
    $scountry = "";
    $py = "";
    $spy = "";
    $sp    = "";
    $spo6    = "";
    $sboard = "";
    $ssname = "";
    $sedug = "";
    $isdiploma = "";
    $hpy = "";
    $hppt = "";
    $hpt = "";
    $hboard = "";
    $hto5 = "";
    $hmtp6 = "";
    $heg = "";
    $hsname = "";
    $dpy = "";
    $dcgpa = "";
    $dcn = "";
    $dvms1 = "";
    $dvms2    = "";
    $dvms3 = "";
    $dvms4    = "";
    $dvms5 = "";
    $dvms6 = "";
    $dtbl = "";
    $degp = "";
    $bvms1 = "";
    $bvms2    = "";
    $bvms3    = "";
    $bvms4    = "";
    $bvms5 = "";
    $bvms6 = "";
    $bvms7 = "";
    $bvms8 = "";
    $bccpi = "";
    $babl    = "";
    $bcbl = "";
    $btbl = "";
    $targetDir = "";
    $profilefile = "";
    $targetFilePath = "";



    if (isset($_GET["id"])) {
        $email = isset($_GET["id"]) ? $_GET["id"] : $_POST["pemail"];
        $search = $conn->query("SELECT * FROM student,student_document,student_academic WHERE student.pemail='$email' and student.pemail=student_document.s_email and student.pemail=student_academic.s_email");
        if ($search->num_rows == 1) {
            $row = $search->fetch_assoc();
            $id_number = $row["id_number"];
            $department = $row["dept_id"];
            $isApproved = $row["is_approved"];
            $fname = $row["first_name"];
            $lname = $row["last_name"];
            $mname = $row["middle_name"];
            $mobile = $row["mobile"];
            $semail = $row["semail"];
            $gender = $row["gender"];
            $linkedin_url = $row["linkedinurl"];
            $dob = $row["dob"];
            $enro = $row["enrolno"];
            $category = $row["category"];
            $pgoal = $row["isinterestedforplacement"];
            $pplotno = $row["paddressline1"];
            $pcity = $row["paddresslcity"];
            $ppin = $row["paddresslpin"];
            $pdistrict = $row["paddressldis"];
            $pstate = $row["paddresslstate"];
            $pcountry = $row["paddresslcountry"];
            $splotno = $row["tpaddressline1"];
            $scity = $row["paddresslcity"];
            $spin = $row["paddresslpin"];
            $sdistrict = $row["paddressldis"];
            $sstate = $row["paddresslstate"];
            $scountry = $row["paddresslcountry"];
            $py = $row["bvm_passing_year"];
            $spy = $row["ssc_passing_year"];
            $sp = $row["ssc_th_percentage"];
            $spo6 = $row["ssc_total"];
            $sboard = $row["ssc_board"];
            $ssname = $row["ssc_school"];
            $sedug = $row["ssc_educational_gap"];
            $isdiploma = $row["isd2d"];
            $hpy = $row["hsc_passing_year"];
            $hppt = $row["hsc_th_p_percentage"];
            $hpt = $row["hsc_th_percentage"];
            $hboard = $row["hsc_board"];
            $hto5 = $row["hsc_th_marks"];
            $hmtp6 = $row["hsc_th_p_marks"];
            $heg = $row["hsc_educational_gap"];
            $hsname = $row["hsc_school"];
            $dpy = $row["d2d_passing_year"];
            $dcgpa = $row["d2d_cgpa"];
            $dcn = $row["d2d_college"];
            $dvms1 = $row["d2d_sem1"];
            $dvms2 = $row["d2d_sem2"];
            $dvms3 = $row["d2d_sem3"];
            $dvms4 = $row["d2d_sem4"];
            $dvms5 = $row["d2d_sem5"];
            $dvms6 = $row["d2d_sem6"];
            $dtbl = $row["d2d_backlogs"];
            $degp = $row["d2d_educational_gap"];
            $bvms1 = $row["bvm_sem1"];
            $bvms2 = $row["bvm_sem2"];
            $bvms3 = $row["bvm_sem3"];
            $bvms4 = $row["bvm_sem4"];
            $bvms5 = $row["bvm_sem5"];
            $bvms6 = $row["bvm_sem6"];
            $bvms7 = $row["bvm_sem7"];
            $bvms8 = $row["bvm_sem8"];
            $bccpi = $row["bvm_cpi"];
            $babl = $row["bvm_active_backlog"];
            $bcbl = $row["bvm_dead_backlog"];
            $btbl = $row["bvm_total_backlog"];




            $path = "uploads/" . $adminUserEmail . "/";
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $targetDir = $path;
            $fileName1 = $row["photo"];
            $fileName1 = $targetDir . $fileName1;
            $fileName2 = $row["ssc_marksheet"];
            $fileName2 = $targetDir . $fileName2;
            $fileName3 = $row["hsc_marksheet"];
            $fileName3 = $targetDir . $fileName3;
            $fileName4 = $row["d2d_marksheet"];
            $fileName4 = $targetDir . $fileName4;
            $fileName5 = $row["bvm_marksheet"];
            $fileName5 = $targetDir . $fileName5;
        }
    }

    if (isset($_POST["update-profile"])) {
        $id_number = $_POST["id_number"];
        $department = $_POST["department"];
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $mname = $_POST["mname"];
        $mobile = $_POST["mobile"];
        $semail = $_POST["semail"];
        $gender = $_POST["gender"];
        $linkedin_url = $_POST["linkedin_url"];
        $dob = $_POST["dob"];
        $enro = $_POST["enro"];
        $category = $_POST["category"];
        $pgoal = $_POST["pgoal"];
        $pplotno = $_POST["pplotno"];
        $pcity = $_POST["pcity"];
        $ppin = $_POST["ppin"];
        $pdistrict = $_POST["pdistrict"];
        $pstate = $_POST["pstate"];
        $pcountry = $_POST["pcountry"];
        $splotno = $_POST["splotno"];
        $scity = $_POST["scity"];
        $spin = $_POST["spin"];
        $sdistrict = $_POST["sdistrict"];
        $sstate = $_POST["sstate"];
        $scountry = $_POST["scountry"];
        $py = $_POST["py"];
        $spy = $_POST["spy"];
        $sp = $_POST["sp"];
        $spo6 = $_POST["spo6"];
        $sboard = $_POST["sboard"];
        $ssname = $_POST["ssname"];
        $sedug = $_POST["sedug"];
        $isdiploma = $_POST["isdiploma"];
        $hpy = $_POST["hpy"];
        $hppt = $_POST["hppt"];
        $hpt = $_POST["hpt"];
        $hboard = $_POST["hboard"];
        $hto5 = $_POST["hto5"];
        $hmtp6 = $_POST["hmtp6"];
        $heg = $_POST["heg"];
        $hsname = $_POST["hsname"];
        $dpy = $_POST["dpy"];
        $dcgpa = $_POST["dcgpa"];
        $dcn = $_POST["dcn"];
        $dvms1 = $_POST["dvms1"];
        $dvms2 = $_POST["dvms2"];
        $dvms3 = $_POST["dvms3"];
        $dvms4 = $_POST["dvms4"];
        $dvms5 = $_POST["dvms5"];
        $dvms6 = $_POST["dvms6"];
        $dtbl = $_POST["dtbl"];
        $degp = $_POST["degp"];
        $bvms1 = $_POST["bvms1"];
        $bvms2 = $_POST["bvms2"];
        $bvms3 = $_POST["bvms3"];
        $bvms4 = $_POST["bvms4"];
        $bvms5 = $_POST["bvms5"];
        $bvms6 = $_POST["bvms6"];
        $bvms7 = $_POST["bvms7"];
        $bvms8 = $_POST["bvms8"];
        $bccpi = $_POST["bccpi"];
        $babl = $_POST["babl"];
        $bcbl = $_POST["bcbl"];
        $btbl = $_POST["btbl"];




        $path = "./uploads/" . $adminUserEmail . "/";
        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }
        $targetDir = $path;
        // if ($profilefile != "null") {
        $fileName1 = basename($_FILES["profilefile"]["name"]);
        $targetFilePath = $targetDir . $fileName1;
        move_uploaded_file($_FILES["profilefile"]["tmp_name"], $targetFilePath);
        // }
        // if ($sscsheet != "null") {
        $fileName2 = basename($_FILES["sscsheet"]["name"]);
        $targetFilePath = $targetDir . $fileName2;
        move_uploaded_file($_FILES["sscsheet"]["tmp_name"], $targetFilePath);
        // }
        // if ($hscsheet != "null") {
        $fileName3 = basename($_FILES["hscsheet"]["name"]);
        $targetFilePath = $targetDir . $fileName3;
        move_uploaded_file($_FILES["hscsheet"]["tmp_name"], $targetFilePath);
        // }
        // if ($d2dsheets != "null") {

        $fileName4 = basename($_FILES["d2dsheets"]["name"]);
        $targetFilePath = $targetDir . $fileName4;
        move_uploaded_file($_FILES["d2dsheets"]["tmp_name"], $targetFilePath);
        // }
        // if ($bvmsheets != "null") {

        $fileName5 = basename($_FILES["bvmsheets"]["name"]);
        $targetFilePath = $targetDir . $fileName5;
        move_uploaded_file($_FILES["bvmsheets"]["tmp_name"], $targetFilePath);
        // }

        $query = "update student set `id_number`='$id_number', `first_name`='$fname', `middle_name`='$lname', `last_name`='$mname', `gender`='$gender', `mobile`='$mobile', `pemail`='$adminUserEmail', `semail`='$semail', `dept_id`='$department', `linkedinurl`='$linkedin_url', `dob`='$dob', `enrolno`='$enro', `category`='$category', `isinterestedforplacement`='$pgoal', `paddressline1`='$pplotno', `paddresslcity`='$pcity', `paddressldis`='$ppin', `paddresslpin`='$pdistrict', `paddresslstate`='$pstate', `paddresslcountry`='$pcountry', `tpaddressline1`='$splotno', `taddresslcity`='$scity', `taddressldis`='$sdistrict', `taddresslpin`='$spin', `taddresslstate`='$sstate', `taddresslcountry`='$scountry', `is_registered`='1', `is_approved`='0', `is_placed`='0', `bvm_passing_year`='$py' where pemail='$adminUserEmail';";
        //echo $query . "<br>";
        $add = $conn->query($query);
        $query = "update student_academic set `s_id`='$id_number',`s_email`='$adminUserEmail', `ssc_passing_year`='$spy',`ssc_th_percentage`='$sp', `ssc_total`='$spo6', `ssc_board`='$sboard', `ssc_school`='$ssname', `ssc_educational_gap`='$sedug',`isd2d`='$isdiploma', `hsc_passing_year`='$hpy', `hsc_th_percentage`='$hpt', `hsc_th_p_percentage`='$hppt', `hsc_th_marks`='$hto5', `hsc_th_p_marks`='$hmtp6', `hsc_board`='$hboard', `hsc_school`='$hsname',  `hsc_educational_gap`='$heg', `d2d_passing_year`='$dpy', `d2d_cgpa`='$dcgpa', `d2d_college`='$dcn', `d2d_sem1`='$dvms1', `d2d_sem2`='$dvms2', `d2d_sem3`='$dvms3', `d2d_sem4`='$dvms4', `d2d_sem5`='$dvms5', `d2d_sem6`='$dvms6', `d2d_backlogs`='$dtbl', `d2d_educational_gap`='$degp', `bvm_sem1`='$bvms1', `bvm_sem2`='$bvms2', `bvm_sem3`='$bvms3', `bvm_sem4`='$bvms4', `bvm_sem5`='$bvms5', `bvm_sem6`='$bvms6', `bvm_sem7`='$bvms7', `bvm_sem8`='$bvms8', `bvm_active_backlog`='$babl', `bvm_dead_backlog`='$bcbl', `bvm_total_backlog`='$btbl', `bvm_cpi`='$bccpi' where `s_email`='$adminUserEmail';";
        //echo $query . "<br>";
        $add = $conn->query($query);
        $query = "update student_document set `s_id`='$id_number',`s_email`='$adminUserEmail', `ssc_marksheet`='$fileName2', `hsc_marksheet`='$fileName3', `d2d_marksheet`='$fileName4', `bvm_marksheet`='$fileName5', `photo`='$fileName1' where `s_email`='$adminUserEmail';";
        //echo $query . "<br>";
        $add = $conn->query($query);
        echo "<script> window.location.href = ./trials.php?id=" . $adminUserEmail . "</script>";
        // $fileName6 = basename($html2pdf);
        // $targetFilePath = $targetDir . $fileName6;
        // move_uploaded_file($html2pdf, $targetFilePath);

        // $query = "update student_document set `primary_resume`='$html2pdf' where s_email='$adminUserEmail';";
        // echo $query . "<br>";
        // $add = $conn->query($query);
        if ($conn->affected_rows) {
            $updateSuccess = 1;
        } else {
            // var_dump($conn->error_list);
            $updateFailure = 1;
        }
    }



?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./helper/sidebar.css">
        <?php
        if ($updateSuccess == 1) {
            echo "<script>
        window.location.href = './showUserDetails.php';
        </script>";
        }
        ?>
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
        <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
        <link rel="stylesheet" href="./helper/index.css">
        <link rel="stylesheet" href="./helper/sidebar.css">
        <link rel="stylesheet" href="./helper/viewStudent.css">
        <title>View Student</title>
    </head>

    <body>
        <?php include("./helper/sidebar.php") ?>

        <div class="container">
            <main>
                <form action="./updateProfile.php" method="POST" enctype="multipart/form-data">
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row  d-flex justify-content-center">
                                <?php if ($updateSuccess == 1) : ?>
                                    <p class="bg-success text-white text-center">Your Profile is Under Verification </p>
                                    <?php
                                    // echo "<script>
                                    //     window.location.href = './showUserDetails.php';
                                    // </script>";
                                    // echo "Profile approval";
                                    ?>

                                <?php endif ?>
                                <?php if ($updateFailure == 1) : ?>
                                    <p class="bg-danger text-white text-center">Error in Updating your profile.Try again </p>
                                <?php endif ?>
                                <form action="./updateProfile.php" method="post">
                                    <div class="">
                                        <div class="card user-card-full">
                                            <div class="row m-l-0 m-r-0">
                                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                                    <div class="card-block text-center text-white">
                                                        <div class="m-b-25">
                                                            <img src="<?php echo $fileName1 ?>" id="showLogo" class="img-radius my-5" alt="Profile-Iamge">
                                                            <input type="file" name="profilefile" id="file" class="inputfile" value="<?php echo $filename1  ?>" />
                                                            <label for="file">Upload</label>
                                                        </div>
                                                        <p>
                                                            <?php if ($isApproved == 1) { ?>
                                                                <span class="badge text-white badge-lg badge-dot">
                                                                    <i class="bg-success"></i> Approved
                                                                </span>
                                                            <?php } else { ?>
                                                                <span class="badge text-white badge-lg badge-dot">
                                                                    <i class="bg-warning"></i> Pending
                                                                </span>
                                                            <?php } ?>
                                                        </p>
                                                        <!-- <h2 class="f-w-600">Dhyey Badheka</h2> -->
                                                        <p><?php echo $adminUserEmail ?></p>
                                                        <br>
                                                        <input type="text" class="m-b-5 form-control" name="id_number" placeholder="ID Number" value="<?php echo $id_number ?>">
                                                        <br>
                                                        <select name="department" id="dept" value="<?php echo $department ?>" class="form-control" required>
                                                            <option value="0">Select Your Department</option>
                                                            <?php
                                                            $dept = "SELECT * FROM department";
                                                            $result = mysqli_query($conn, $dept);
                                                            while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                                <option value="<?php echo $row["dept_id"] ?>" <?php if ($department == $row["dept_id"]) echo " selected " ?>><?php echo $row["dept_name"] ?></option>
                                                            <?php

                                                            }

                                                            ?>
                                                        </select>
                                                        <br>
                                                        <p>Passing Year:</p>
                                                        <input type="text" class="m-b-5 form-control" name="py" value="<?php echo $py ?>" placeholder="2023">
                                                        <br>
                                                        <!-- <p>19IT450</p>
                                            <p>Information Technology</p> -->
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Personal Information</h6>
                                                        <div class="row m-b-20">
                                                            <div class="col-sm-6 ">
                                                                <p class="m-b-5 f-w-600">First Name</p>
                                                                <input type="text" class="m-b-5 form-control" name="fname" id="" placeholder="First Name" value="<?php echo $fname ?>">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Middle Name</p>
                                                                <input type="text" class="m-b-5 form-control" name="lname" id="" placeholder="Middle Name" value="<?php echo $mname ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row m-b-20">
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Last Name</p>
                                                                <input type="text" class="m-b-5 form-control" name="mname" id="" placeholder="Last Name" value="<?php echo $lname ?>">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Phone</p>
                                                                <input type="number" class="m-b-5 form-control" name="mobile" id="" placeholder="9999999999" value="<?php echo $mobile ?>">
                                                            </div>
                                                        </div>
                                                        <div class="row m-b-20">
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Secondary Email</p>
                                                                <input type="email" class="m-b-5 form-control" name="semail" id="" placeholder="abc@gmail.com" value="<?php echo $semail ?>">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Gender</p>

                                                                <p> <input type="radio" id="Male" name="gender" value="male" <?php if ($gender == "male") echo " checked " ?>> Male</input> </p>

                                                                <p>
                                                                    <input type="radio" id="Female" name="gender" <?php if ($gender == "female") echo " checked " ?> value="female"> Female</input>
                                                                </p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Linkedin URL</p>
                                                                <input type="text" class="m-b-5 form-control" name="linkedin_url" id="" placeholder="www.linked.in.com" value="<?php echo $linkedin_url ?>">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Date of Birth</p>
                                                                <input type="date" class="m-b-5 form-control" name="dob" id="" value="<?php echo $dob ?>">
                                                            </div>
                                                        </div>

                                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Other Details </h6>
                                                        <div class="row m-b-20">
                                                            <div class="col-sm-4">
                                                                <p class="m-b-5 f-w-600">Enrollment Number</p>
                                                                <input type="text" class="m-b-5 form-control" name="enro" id="" placeholder="123456789000" value="<?php echo $enro ?>">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="m-b-5 f-w-600">Category</p>
                                                                <p> <input type="radio" id="general" name="category" value="general" <?php if ($category == "general") echo " checked " ?>> General</input> </p>
                                                                <p> <input type="radio" id="scst" name="category" value="scst" <?php if ($category == "scst") echo " checked " ?>> SC/ST</input> </p>
                                                                <p> <input type="radio" id="obc" name="category" value="obc" <?php if ($category == "obc") echo " checked " ?>> OBC</input> </p>

                                                            </div>
                                                            <div class="col-sm-5">
                                                                <p class="m-b-5 f-w-600">Future Goals(1st Priority)</p>
                                                                <p> <input type="radio" id="pplacement" name="pgoal" value="1" <?php if ($pgoal == "1") echo " checked " ?>> Campus Placement</input> </p>
                                                                <p> <input type="radio" id="pstudy" name="pgoal" value="0" <?php if ($pgoal == "0") echo " checked " ?>> Further Studies</input> </p>
                                                            </div>

                                                        </div>
                                                        <div class="row m-b-20">
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Permanent Address</p>
                                                                <input type="text" placeholder="Plot No and Landmark" class="m-b-5 form-control" name="pplotno" id="" value="<?php echo $pplotno  ?>">
                                                                <input type="text" placeholder="City" class="m-b-5 form-control" name="pcity" id="" placeholder="Bhavnagar" value="<?php echo $pcity   ?>">
                                                                <input type="text" placeholder="District" class="m-b-5 form-control" name="pdistrict" id="" placeholder="Bhavnagar" value="<?php echo $pdistrict  ?>">
                                                                <input type="number" placeholder="pincode" class="m-b-5 form-control" name="ppin" id="" placeholder="364002" value="<?php echo $ppin  ?>">
                                                                <input type="text" placeholder="State" class="m-b-5 form-control" name="pstate" id="" placeholder="Gujarat" value="<?php echo $pstate  ?>">
                                                                <input type="text" placeholder="Country" class="m-b-5 form-control" name="pcountry" id="" placeholder="India" value="<?php echo $pcountry  ?>">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Current Address</p>
                                                                <input type="text" placeholder="Plot No and Landmark" class="m-b-5 form-control" name="splotno" id="" value="<?php echo $splotno  ?>">
                                                                <input type="text" placeholder="City" class="m-b-5 form-control" name="scity" id="" placeholder="Bhavnagar" value="<?php echo $scity  ?>">
                                                                <input type="text" placeholder="District" class="m-b-5 form-control" name="sdistrict" id="" placeholder="Bhavnagar" value="<?php echo $sdistrict  ?>">
                                                                <input type="number" placeholder="pincode" class="m-b-5 form-control" name="spin" id="" placeholder="364002" value="<?php echo $spin  ?>">
                                                                <input type="text" placeholder="State" class="m-b-5 form-control" name="sstate" id="" placeholder="Gujarat" value="<?php echo $sstate  ?>">
                                                                <input type="text" placeholder="Country" class="m-b-5 form-control" name="scountry" id="" placeholder="India" value="<?php echo $scountry  ?>">
                                                            </div>
                                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">SSC Details </h6>
                                                            <div class="row m-b-20">
                                                                <div class="col-sm-3">
                                                                    <p class="m-b-5 f-w-600">Passing Year</p>
                                                                    <input type="text" class="m-b-5 form-control" name="spy" id="" placeholder="2019" value="<?php echo $spy  ?>">
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <p class="m-b-5 f-w-600">Percentage</p>
                                                                    <input type="text" class="m-b-5 form-control" name="sp" id="" placeholder="99%" value="<?php echo $sp  ?>">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <p class="m-b-5 f-w-600">out of 600
                                                                        or out of 10(other board)
                                                                    </p>
                                                                    <input type="text" class="m-b-5 form-control" name="spo6" id="" value="<?php echo $spo6  ?>" placeholder="Write 550/600 or 9/10">
                                                                </div>
                                                                <div class="row m-b-20">
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-5 f-w-600">Board of SSC</p>
                                                                        <input type="text" class="m-b-5 form-control" name="sboard" id="" placeholder="GSEB" value="<?php echo $sboard  ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">School Name</p>
                                                                        <input type="text" class="m-b-5 form-control" name="ssname" id="" placeholder="school Name" value="<?php echo $ssname  ?>">
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-5 f-w-600">Upload Marksheet</p>
                                                                        <input type="file" id="actual-btn" name="sscsheet" value="<?php echo $filename2  ?>" />
                                                                        <a href="http://localhost/tpc-main/student/<?php echo $fileName2; ?>"><button class="text-center btn btn-success">View</button></a>
                                                                    </div>
                                                                    <div class="row m-b-20">
                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">Educational Gaps after SSC(0 if NA)</p>
                                                                            <input type="text" class="m-b-5 form-control" name="sedug" id="" placeholder="0" value="<?php echo $sedug  ?>">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">HSC/Diploma</p>
                                                                            <p> <input type="radio" id="isdiploma" name="isdiploma" value="0" <?php if ($isdiploma == "0") echo " checked " ?>> HSC</input> </p>
                                                                            <p> <input type="radio" id="isdiploma" name="isdiploma" value="1" <?php if ($isdiploma == "1") echo " checked " ?>> Diploma</input> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">HSC Details </h6>
                                                                <div class="row m-b-20">
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-5 f-w-600">Passing Year</p>
                                                                        <input type="text" class="m-b-5 form-control" name="hpy" id="" placeholder="2019" value="<?php echo $hpy  ?>">
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">Percentage(Theory+Practical)</p>
                                                                        <input type="text" class="m-b-5 form-control" name="hppt" id="" placeholder="99%" value="<?php echo $hppt  ?>">>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">Percentage(Theory)</p>
                                                                        <input type="text" class="m-b-5 form-control" name="hpt" id="" placeholder="99%" value="<?php echo $hpt  ?>">>
                                                                    </div>
                                                                    <div class="row m-b-20">
                                                                        <div class="col-sm-7">
                                                                            <p class="m-b-5 f-w-600">Theory Marks out of 500(410 if CBSE)
                                                                            </p>
                                                                            <input type="text" class="m-b-5 form-control" name="hto5" id="" placeholder="Write 450/500 or 390/410" value="<?php echo $hto5  ?>">>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">Board of HSC</p>
                                                                            <input type="text" class="m-b-5 form-control" name="hboard" id="" placeholder="GSEB" value="<?php echo $hboard  ?>">>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row m-b-20">

                                                                        <div class="col-sm-7">
                                                                            <p class="m-b-5 f-w-600">Theory+Practical Marks out of 650(500 if CBSE)
                                                                            </p>
                                                                            <input type="text" class="m-b-5 form-control" name="hmtp6" id="" placeholder="Write 550/650 or 490/500" value="<?php echo $hmtp6  ?>">>
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            <p class="m-b-5 f-w-600">Educational Gaps after HSC(0 if NA)</p>
                                                                            <input type="text" class="m-b-5 form-control" name="heg" id="" placeholder="0" value="<?php echo $heg  ?>">>
                                                                        </div>
                                                                        <div class="col-sm-7">
                                                                            <p class="m-b-5 f-w-600">School Name</p>
                                                                            <input type="text" class="m-b-5 form-control" name="hsname" id="" placeholder="Gyanmanjari Vidyapith" value="<?php echo $hsname  ?>">>
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <p class="m-b-5 f-w-600">Upload Marksheet</p>
                                                                            <input type="file" id="actual-btn" name="hscsheet" value="<?php echo $filename3  ?>" />
                                                                            <a href="http://localhost/tpc-main/student/<?php echo $fileName3; ?>"><button class="text-center btn btn-success">View</button></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">D2D Details </h6>
                                                                <div class="row m-b-20">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Passing Year</p>
                                                                        <input type="text" class="m-b-5 form-control" name="dpy" id="" placeholder="2019" value="<?php echo $dpy  ?>">>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Final CGPA</p>
                                                                        <input type="text" class="m-b-5 form-control" name="dcgpa" id="" placeholder="9.33" value="<?php echo $dcgpa  ?>">>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">College Name</p>
                                                                        <input type="text" class="m-b-5 form-control" name="dcn" id="" placeholder="College Name" value="<?php echo $dcn  ?>">>
                                                                    </div>
                                                                    <div class="row m-b-20">
                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">SEM 1 SPI</p>
                                                                            <input type="text" class="m-b-5 form-control" name="dvms1" id="" placeholder="9.1" value="<?php echo $dvms1  ?>">>
                                                                        </div>


                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">SEM 2 SPI</p>
                                                                            <input type="text" class="m-b-5 form-control" name="dvms2" id="" placeholder="9.1" value="<?php echo $dvms2  ?>">>
                                                                        </div>


                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">SEM 3 SPI</p>
                                                                            <input type="text" class="m-b-5 form-control" name="dvms3" id="" placeholder="9.1" value="<?php echo $dvms3  ?>">>
                                                                        </div>


                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">SEM 4 SPI</p>
                                                                            <input type="text" class="m-b-5 form-control" name="dvms4" id="" placeholder="9.1" value="<?php echo $dvms4  ?>">>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">SEM 5 SPI</p>
                                                                            <input type="text" class="m-b-5 form-control" name="dvms5" id="" placeholder="9.1" value="<?php echo $dvms5  ?>">>
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">SEM 6 SPI</p>
                                                                            <input type="text" class="m-b-5 form-control" name="dvms6" id="" placeholder="9.1" value="<?php echo $dvms6  ?>">>
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">Diploma All Marksheets</p>
                                                                            <input type="file" id="actual-btn" name="d2dsheets" value="<?php echo $filename4  ?>" /> <a href=" http://localhost/tpc-main/student/<?php echo $fileName3; ?>"><button class="text-center btn btn-success">View</button></a>
                                                                        </div>

                                                                        <div class="col-sm-3">
                                                                            <p class="m-b-5 f-w-600">Total Backlogs</p>
                                                                            <input type="number" class="m-b-5 form-control" name="dtbl" id="" placeholder="0" value="<?php echo $dtbl  ?>">>
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            <p class="m-b-5 f-w-600">Educational Gaps after Diploma(0 if NA)</p>
                                                                            <input type="text" class="m-b-5 form-control" name="degp" id="" placeholder="0" value="<?php echo $degp  ?>">>
                                                                        </div>
                                                                    </div>
                                                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">College Details</h6>
                                                                    <div class="row m-b-20">
                                                                        <div class="row m-b-20">
                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 1 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms1" id="" placeholder="9.1" value="<?php echo $bvms1  ?>">>
                                                                            </div>


                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 2 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms2" id="" placeholder="9.1" value="<?php echo $bvms2  ?>">
                                                                            </div>


                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 3 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms3" id="" placeholder="9.1" value="<?php echo $bvms3  ?>">
                                                                            </div>


                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 4 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms4" id="" placeholder="9.1" value="<?php echo $bvms4  ?>">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 5 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms5" id="" placeholder="9.1" value="<?php echo $bvms5  ?>">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 6 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms6" id="" placeholder="9.1" value="<?php echo $bvms6  ?>">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 7 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms7" id="" placeholder="9.1" value="<?php echo $bvms7  ?>">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 8 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms8" id="" placeholder="9.1" value="<?php echo $bvms8  ?>">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row m-b-20">
                                                                            <div class="row m-b-20">
                                                                                <div class="col-sm-4">
                                                                                    <p class="m-b-5 f-w-600">Current CPI</p>
                                                                                    <input type="text" class="m-b-5 form-control" name="bccpi" id="" placeholder="9.1" value="<?php echo $bccpi  ?>">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <p class="m-b-5 f-w-600">Active Backlog</p>
                                                                                    <input type="text" class="m-b-5 form-control" name="babl" id="" placeholder="9.1" value="<?php echo $babl  ?>">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <p class="m-b-5 f-w-600">Cleared Backlog</p>
                                                                                    <input type="text" class="m-b-5 form-control" name="bcbl" id="" placeholder="0" value="<?php echo $bcbl  ?>">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <p class="m-b-5 f-w-600">Total Backlog</p>
                                                                                    <input type="text" class="m-b-5 form-control" name="btbl" id="" placeholder="0" value="<?php echo $btbl  ?>">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <p class="m-b-5 f-w-600">BVM All Marksheets</p>
                                                                                    <input type="file" id="actual-btn" name="bvmsheets" value="<?php echo $filename5  ?>" /> <a href="http://localhost/tpc-main/student/<?php echo $fileName5; ?>"><button class="text-center btn btn-success">View</button></a>
                                                                                </div>


                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <input type="submit" value="Submit" name="update-profile" class="text-center btn btn-primary m-5" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </main>
        </div>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./helper/sidebar.js"></script>
        <script>
            function imagePreview(fileInput) {
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showLogo').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }

            $("#file").change(function() {
                imagePreview(this);
            });
        </script>
    </body>

    </html>
<?php
} else {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
    // echo "user var not set";
}
?>