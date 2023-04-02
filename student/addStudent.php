<?php
$reqFor = "add";
include("../database.php");
include("./helper/authorization.php");

if (isset($_SESSION["studentUserId"]) && $access == 1) {
    $addSuccess = 0;
    $addFailure = 0;
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


    if (isset($_POST["add-student"])) {
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

        $query = "update student set `id_number`=lower('$id_number'), `first_name`='$fname', `middle_name`='$lname', `last_name`='$mname', `gender`='$gender', `mobile`='$mobile', `pemail`='$adminUserEmail', `semail`='$semail', `dept_id`='$department', `linkedinurl`='$linkedin_url', `dob`='$dob', `enrolno`='$enro', `category`='$category', `isinterestedforplacement`='$pgoal', `paddressline1`='$pplotno', `paddresslcity`='$pcity', `paddressldis`='$ppin', `paddresslpin`='$pdistrict', `paddresslstate`='$pstate', `paddresslcountry`='$pcountry', `tpaddressline1`='$splotno', `taddresslcity`='$scity', `taddressldis`='$sdistrict', `taddresslpin`='$spin', `taddresslstate`='$sstate', `taddresslcountry`='$scountry', `is_registered`='1', `is_approved`='0', `is_placed`='0', `bvm_passing_year`='$py' where pemail='$adminUserEmail';";
        // echo $query . "<br>";
        $add = $conn->query($query);
        $query = "INSERT INTO `student_academic` (`s_id`,`s_email`, `ssc_passing_year`,`ssc_th_percentage`, `ssc_total`, `ssc_board`, `ssc_school`, `ssc_educational_gap`,`isd2d`, `hsc_passing_year`, `hsc_th_percentage`, `hsc_th_p_percentage`, `hsc_th_marks`, `hsc_th_p_marks`, `hsc_board`, `hsc_school`,  `hsc_educational_gap`, `d2d_passing_year`, `d2d_cgpa`, `d2d_college`, `d2d_sem1`, `d2d_sem2`, `d2d_sem3`, `d2d_sem4`, `d2d_sem5`, `d2d_sem6`, `d2d_backlogs`, `d2d_educational_gap`, `bvm_sem1`, `bvm_sem2`, `bvm_sem3`, `bvm_sem4`, `bvm_sem5`, `bvm_sem6`, `bvm_sem7`, `bvm_sem8`, `bvm_active_backlog`, `bvm_dead_backlog`, `bvm_total_backlog`, `bvm_cpi`) VALUES
('$id_number','$adminUserEmail','$spy','$sp','$spo6','$sboard','$ssname','$sedug','$isdiploma','$hpy','$hpt','$hppt','$hto5','$hmtp6','$hboard','$hsname','$heg','$dpy','$dcgpa','$dcn','$dvms1','$dvms2','$dvms3','$dvms4','$dvms5','$dvms6','$dtbl','$degp','$bvms1','$bvms2','$bvms3','$bvms4','$bvms5','$bvms6','$bvms7','$bvms8','$babl','$bcbl','$btbl ','$bccpi');";
        // echo $query . "<br>";
        $add = $conn->query($query);
        $query = "INSERT INTO `student_document` (`s_id`,`s_email`, `ssc_marksheet`, `hsc_marksheet`, `d2d_marksheet`, `bvm_marksheet`, `photo`) VALUES
('$id_number', '$adminUserEmail','$fileName2','$fileName3','$fileName4','$fileName5','$fileName1');";
        // echo $query . "<br>";
        $add = $conn->query($query);
        if ($conn->affected_rows) {
            $addSuccess = 1;
        } else {
            // var_dump($conn->error_list);
            $addFailure = 1;
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
                <form action="./addStudent.php" method="POST" enctype="multipart/form-data">
                    <div class="page-content page-container" id="page-content">
                        <div class="padding">
                            <div class="row  d-flex justify-content-center">
                                <?php if ($addSuccess == 1) : ?>
                                    <p class="bg-success text-white text-center">Your Profile is Under Verification </p>
                                    <?php
                                    echo "<script>
                                        window.location.href = './showUserDetails.php';
                                    </script>";
                                    // echo "Profile approval";
                                    ?>

                                <?php endif ?>
                                <?php if ($addFailure == 1) : ?>
                                    <p class="bg-danger text-white text-center">Error in Adding your profile.Try again </p>
                                <?php endif ?>
                                <form action="./addStudent.php" method="post">
                                    <div class="">
                                        <div class="card user-card-full">
                                            <div class="row m-l-0 m-r-0">
                                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                                    <div class="card-block text-center text-white">
                                                        <div class="m-b-25">
                                                            <img src="#" id="showLogo" class="img-radius my-5" alt="Profile-Iamge">
                                                            <input type="file" name="profilefile" id="file" class="inputfile" />
                                                            <label for="file">Upload</label>
                                                        </div>
                                                        <p>
                                                            <span class="badge text-white badge-lg badge-dot">
                                                                <i class="bg-warning"></i> Pending
                                                            </span>
                                                        </p>
                                                        <!-- <h2 class="f-w-600">Dhyey Badheka</h2> -->
                                                        <p><?php echo $adminUserEmail ?></p>
                                                        <br>
                                                        <input type="text" class="m-b-5 form-control" name="id_number" placeholder="ID Number">
                                                        <br>
                                                        <select name="department" id="dept" class="form-control" required>
                                                            <option value="0">Select Your Department</option>
                                                            <?php
                                                            $dept = "SELECT * FROM department";
                                                            $result = mysqli_query($conn, $dept);
                                                            while ($row = $result->fetch_assoc()) {
                                                            ?>
                                                                <option value="<?php echo $row["dept_id"] ?>"><?php echo $row["dept_name"] ?></option>
                                                            <?php

                                                            }

                                                            ?>
                                                        </select>
                                                        <br>
                                                        <p>Passing Year:</p>
                                                        <input type="text" class="m-b-5 form-control" name="py" placeholder="2023">
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
                                                                <input type="text" class="m-b-5 form-control" name="fname" id="" placeholder="First Name">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Middle Name</p>
                                                                <input type="text" class="m-b-5 form-control" name="lname" id="" placeholder="Middle Name">
                                                            </div>
                                                        </div>
                                                        <div class="row m-b-20">
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Last Name</p>
                                                                <input type="text" class="m-b-5 form-control" name="mname" id="" placeholder="Last Name">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Phone</p>
                                                                <input type="number" class="m-b-5 form-control" name="mobile" id="" placeholder="9999999999">
                                                            </div>
                                                        </div>
                                                        <div class="row m-b-20">
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Secondary Email</p>
                                                                <input type="email" class="m-b-5 form-control" name="semail" id="" placeholder="abc@gmail.com">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Gender</p>
                                                                <p> <input type="radio" id="Male" name="gender" value="male" checked> Male</input> </p>

                                                                <p>
                                                                    <input type="radio" id="Female" name="gender" value="female"> Female</input>
                                                                </p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Linkedin URL</p>
                                                                <input type="text" class="m-b-5 form-control" name="linkedin_url" id="" placeholder="www.linked.in.com">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Date of Birth</p>
                                                                <input type="date" class="m-b-5 form-control" name="dob" id="">
                                                            </div>
                                                        </div>

                                                        <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Other Details </h6>
                                                        <div class="row m-b-20">
                                                            <div class="col-sm-4">
                                                                <p class="m-b-5 f-w-600">Enrollment Number</p>
                                                                <input type="text" class="m-b-5 form-control" name="enro" id="" placeholder="190080116006">
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <p class="m-b-5 f-w-600">Category</p>
                                                                <p> <input type="radio" id="general" name="category" value="general" checked> General</input> </p>
                                                                <p> <input type="radio" id="scst" name="category" value="scst"> SC/ST</input> </p>
                                                                <p> <input type="radio" id="obc" name="category" value="obc"> OBC</input> </p>

                                                            </div>
                                                            <div class="col-sm-5">
                                                                <p class="m-b-5 f-w-600">Future Goals(1st Priority)</p>
                                                                <p> <input type="radio" id="pplacement" name="pgoal" value="1" checked> Campus Placement</input> </p>
                                                                <p> <input type="radio" id="pstudy" name="pgoal" value="0"> Further Studies</input> </p>
                                                            </div>

                                                        </div>
                                                        <div class="row m-b-20">
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Permanent Address</p>
                                                                <input type="text" placeholder="Plot No and Landmark" class="m-b-5 form-control" name="pplotno" id="">
                                                                <input type="text" placeholder="City" class="m-b-5 form-control" name="pcity" id="" placeholder="Bhavnagar">
                                                                <input type="text" placeholder="District" class="m-b-5 form-control" name="pdistrict" id="" placeholder="Bhavnagar">
                                                                <input type="number" placeholder="pincode" class="m-b-5 form-control" name="ppin" id="" placeholder="364002">
                                                                <input type="text" placeholder="State" class="m-b-5 form-control" name="pstate" id="" placeholder="Gujarat">
                                                                <input type="text" placeholder="Country" class="m-b-5 form-control" name="pcountry" id="" placeholder="India">
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Current Address</p>
                                                                <input type="text" placeholder="Plot No and Landmark" class="m-b-5 form-control" name="splotno" id="">
                                                                <input type="text" placeholder="City" class="m-b-5 form-control" name="scity" id="" placeholder="Bhavnagar">
                                                                <input type="text" placeholder="District" class="m-b-5 form-control" name="sdistrict" id="" placeholder="Bhavnagar">
                                                                <input type="text" placeholder="pincode" class="m-b-5 form-control" name="spin" id="" placeholder="364002">
                                                                <input type="text" placeholder="State" class="m-b-5 form-control" name="sstate" id="" placeholder="Gujarat">
                                                                <input type="text" placeholder="Country" class="m-b-5 form-control" name="scountry" id="" placeholder="India">
                                                            </div>
                                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">SSC Details </h6>
                                                            <div class="row m-b-20">
                                                                <div class="col-sm-3">
                                                                    <p class="m-b-5 f-w-600">Passing Year</p>
                                                                    <input type="text" class="m-b-5 form-control" name="spy" id="" placeholder="2019">
                                                                </div>

                                                                <div class="col-sm-3">
                                                                    <p class="m-b-5 f-w-600">Percentage</p>
                                                                    <input type="text" class="m-b-5 form-control" name="sp" id="" placeholder="99%">
                                                                </div>
                                                                <div class="col-sm-6">
                                                                    <p class="m-b-5 f-w-600">out of 600
                                                                        or out of 10(other board)
                                                                    </p>
                                                                    <input type="text" class="m-b-5 form-control" name="spo6" id="" value="" placeholder="Write 550/600 or 9/10">
                                                                </div>
                                                                <div class="row m-b-20">
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-5 f-w-600">Board of SSC</p>
                                                                        <input type="text" class="m-b-5 form-control" name="sboard" id="" placeholder="GSEB">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">School Name</p>
                                                                        <input type="text" class="m-b-5 form-control" name="ssname" id="" placeholder="school Name">
                                                                    </div>
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-5 f-w-600">Upload Marksheet</p>
                                                                        <input type="file" id="actual-btn" name="sscsheet" />
                                                                    </div>
                                                                    <div class="row m-b-20">
                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">Educational Gaps after SSC(0 if NA)</p>
                                                                            <input type="text" class="m-b-5 form-control" name="sedug" id="" placeholder="0">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">HSC/Diploma</p>
                                                                            <p> <input type="radio" id="isdiploma" name="isdiploma" value="0" checked> HSC</input> </p>
                                                                            <p> <input type="radio" id="isdiploma" name="isdiploma" value="1"> Diploma</input> </p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">HSC Details </h6>
                                                                <div class="row m-b-20">
                                                                    <div class="col-sm-3">
                                                                        <p class="m-b-5 f-w-600">Passing Year</p>
                                                                        <input type="text" class="m-b-5 form-control" name="hpy" id="" placeholder="2019">
                                                                    </div>

                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">Percentage(Theory+Practical)</p>
                                                                        <input type="text" class="m-b-5 form-control" name="hppt" id="" placeholder="99%">
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <p class="m-b-5 f-w-600">Percentage(Theory)</p>
                                                                        <input type="text" class="m-b-5 form-control" name="hpt" id="" placeholder="99%">
                                                                    </div>
                                                                    <div class="row m-b-20">
                                                                        <div class="col-sm-7">
                                                                            <p class="m-b-5 f-w-600">Theory Marks out of 500(410 if CBSE)
                                                                            </p>
                                                                            <input type="text" class="m-b-5 form-control" name="hto5" id="" value="" placeholder="Write 450/500 or 390/410">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">Board of HSC</p>
                                                                            <input type="text" class="m-b-5 form-control" name="hboard" id="" placeholder="GSEB">
                                                                        </div>
                                                                    </div>
                                                                    <div class="row m-b-20">

                                                                        <div class="col-sm-7">
                                                                            <p class="m-b-5 f-w-600">Theory+Practical Marks out of 650(500 if CBSE)
                                                                            </p>
                                                                            <input type="text" class="m-b-5 form-control" name="hmtp6" id="" value="" placeholder="Write 550/650 or 490/500">
                                                                        </div>
                                                                        <div class="col-sm-5">
                                                                            <p class="m-b-5 f-w-600">Educational Gaps after HSC(0 if NA)</p>
                                                                            <input type="text" class="m-b-5 form-control" name="heg" id="" placeholder="0">
                                                                        </div>
                                                                        <div class="col-sm-7">
                                                                            <p class="m-b-5 f-w-600">School Name</p>
                                                                            <input type="text" class="m-b-5 form-control" name="hsname" id="" placeholder="Gyanmanjari Vidyapith">
                                                                        </div>



                                                                        <div class="col-sm-3">
                                                                            <p class="m-b-5 f-w-600">Upload Marksheet</p>
                                                                            <input type="file" id="actual-btn" name="hscsheet" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">D2D Details </h6>
                                                                <div class="row m-b-20">
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Passing Year</p>
                                                                        <input type="text" class="m-b-5 form-control" name="dpy" id="" placeholder="2019">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Final CGPA</p>
                                                                        <input type="text" class="m-b-5 form-control" name="dcgpa" id="" placeholder="9.33">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">College Name</p>
                                                                        <input type="text" class="m-b-5 form-control" name="dcn" id="" placeholder="College Name">
                                                                    </div>
                                                                    <div class="row m-b-20">
                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">SEM 1 SPI</p>
                                                                            <input type="text" class="m-b-5 form-control" name="dvms1" id="" placeholder="9.1">
                                                                        </div>


                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">SEM 2 SPI</p>
                                                                            <input type="text" class="m-b-5 form-control" name="dvms2" id="" placeholder="9.1">
                                                                        </div>


                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">SEM 3 SPI</p>
                                                                            <input type="text" class="m-b-5 form-control" name="dvms3" id="" placeholder="9.1">
                                                                        </div>


                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">SEM 4 SPI</p>
                                                                            <input type="text" class="m-b-5 form-control" name="dvms4" id="" placeholder="9.1">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">SEM 5 SPI</p>
                                                                            <input type="text" class="m-b-5 form-control" name="dvms5" id="" placeholder="9.1">
                                                                        </div>
                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">SEM 6 SPI</p>
                                                                            <input type="text" class="m-b-5 form-control" name="dvms6" id="" placeholder="9.1">
                                                                        </div>

                                                                        <div class="col-sm-4">
                                                                            <p class="m-b-5 f-w-600">Diploma All Marksheets</p>
                                                                            <input type="file" id="actual-btn" name="d2dsheets" />
                                                                        </div>

                                                                        <div class="col-sm-3">
                                                                            <p class="m-b-5 f-w-600">Total Backlogs</p>
                                                                            <input type="number" class="m-b-5 form-control" name="dtbl" id="" placeholder="0">
                                                                        </div>

                                                                        <div class="col-sm-5">
                                                                            <p class="m-b-5 f-w-600">Educational Gaps after Diploma(0 if NA)</p>
                                                                            <input type="text" class="m-b-5 form-control" name="degp" id="" placeholder="0">
                                                                        </div>
                                                                    </div>
                                                                    <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">College Details</h6>
                                                                    <div class="row m-b-20">
                                                                        <div class="row m-b-20">
                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 1 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms1" id="" placeholder="9.1">
                                                                            </div>


                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 2 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms2" id="" placeholder="9.1">
                                                                            </div>


                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 3 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms3" id="" placeholder="9.1">
                                                                            </div>


                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 4 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms4" id="" placeholder="9.1">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 5 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms5" id="" placeholder="9.1">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 6 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms6" id="" placeholder="9.1">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 7 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms7" id="" placeholder="9.1">
                                                                            </div>
                                                                            <div class="col-sm-4">
                                                                                <p class="m-b-5 f-w-600">SEM 8 SPI</p>
                                                                                <input type="text" class="m-b-5 form-control" name="bvms8" id="" placeholder="9.1">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row m-b-20">
                                                                            <div class="row m-b-20">
                                                                                <div class="col-sm-4">
                                                                                    <p class="m-b-5 f-w-600">Current CPI</p>
                                                                                    <input type="text" class="m-b-5 form-control" name="bccpi" id="" placeholder="9.1">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <p class="m-b-5 f-w-600">Active Backlog</p>
                                                                                    <input type="text" class="m-b-5 form-control" name="babl" id="" placeholder="9.1">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <p class="m-b-5 f-w-600">Cleared Backlog</p>
                                                                                    <input type="text" class="m-b-5 form-control" name="bcbl" id="" placeholder="9.1">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <p class="m-b-5 f-w-600">Total Backlog</p>
                                                                                    <input type="text" class="m-b-5 form-control" name="btbl" id="" placeholder="9.1">
                                                                                </div>
                                                                                <div class="col-sm-4">
                                                                                    <p class="m-b-5 f-w-600">BVM All Marksheets</p>
                                                                                    <input type="file" id="actual-btn" name="bvmsheets" />
                                                                                </div>


                                                                            </div>

                                                                        </div>

                                                                    </div>
                                                                    <input type="submit" value="Submit" name="add-student" class="text-center btn btn-primary m-5" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            </main>

        </div>
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