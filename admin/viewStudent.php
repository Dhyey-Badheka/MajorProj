<?php

include("../database.php");
include("../helper/authorization.php");
if ($access >= 1 && $access <= 3) {
} else {
    echo "<script>
    window.location.href = 'http://localhost/tpc-main/helper/noAccess.php';
</script>";
}
$addSuccess = 0;
$addFailure = 0;
$id = $_GET["id"];
if (isset($_POST["approval"])) {
    if ($_POST["approval"] == "Approve") {
        $query = "update student set active=1 where comp_id='$id';";
        $update = $conn->query($query);
    } else if ($_POST["approval"] == "Reject") {
        $query = "update student set active=2 where comp_id='$id';";
        $update = $conn->query($query);
    }
    // $update = $conn->query("update table `result` set `active`=1 where comp_id='$id');");
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
    <?php if ($addSuccess == 1 || $addFailure == 1) : ?>
        <meta http-equiv="refresh" content="2;url=http://localhost/tpc-main/admin/company.php" />
    <?php endif ?>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>View Student</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row  d-flex justify-content-center">
                        <div class="">
                            <?php if ($addSuccess == 1) : ?>
                                <p class="bg-success text-white text-center">Successfully Added </p>
                            <?php endif ?>
                            <?php if ($addFailure == 1) : ?>
                                <p class="bg-danger text-white text-center">Error in Adding the Result </p>
                            <?php endif ?>
                            <?php
                            $search = $conn->query("SELECT * FROM  `student` join student_academic on student.id_number=student_academic.s_id join student_document on student.id_number=student_document.s_id  where student.id_number='$id'");
                            while ($row = $search->fetch_assoc()) {
                            ?>
                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                <div class="m-b-25">
                                                    <img src='http://localhost/tpc-main/admin/uploads/<?php echo $row["photo"]; ?>' class="img-radius" alt="User-Profile-Image">
                                                </div>
                                                <p>
                                                    <?php if ($row["is_approved"] == 0) {
                                                        echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-warning'></i>Pending
                                </span>";
                                                    } else if ($row["is_approved"] == 1) {
                                                        echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-success'></i>Approved
                                </span>";
                                                    } else if ($row["is_approved"] == 2) {
                                                        echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-danger'></i>Rejected
                                </span>";
                                                    }
                                                    ?>
                                                </p>
                                                <h3 class="f-w-600"><?php echo $row["first_name"] . " " . $row["last_name"]; ?></h3>
                                                <div class="row">

                                                    <p class="m-b-10 f-w-600"><?php
                                                                                $dept_id = $row["dept_id"];
                                                                                $search = $conn->query("SELECT dept_name FROM  `department` WHERE dept_id='$dept_id'");
                                                                                $row1 = $search->fetch_assoc();
                                                                                echo $row1["dept_name"] ?> - <?php echo $row["id_number"]; ?></p>
                                                    <!-- <h6 class="f-w-400">f_name</h6> -->

                                                </div>
                                                <div class="row">
                                                    <form action="./viewStudent.php?id=<?php echo $id; ?>" method="post">
                                                        <div class="col-m-1">
                                                            <input type="submit" value="Approve" name="approval" class="text-center btn btn-success m-2" />
                                                        </div>
                                                        <div class="col-m-1">
                                                            <input type="submit" value="Reject" name="approval" class="text-center btn btn-danger m-2" />
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Personal Information</h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6 ">
                                                        <p class="m-b-5 f-w-600">First Name</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["first_name"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Middle Name</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["middle_name"]; ?></h6>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Last Name</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["last_name"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Phone</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["mobile"]; ?></h6>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Email</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["semail"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Gender</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["gender"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Enrollment Number</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["enrolno"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Linkedin Link</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["linkedinurl"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Category </p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["category"]; ?></h6>
                                                    </div>
                                                </div>
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Address Details</h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Permanent Address Line 1</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["paddressline1"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Current Address Line 1</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["tpaddressline1"]; ?></h6>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Permanent Address City</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["paddresslcity"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Current Address City</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["taddresslcity"]; ?></h6>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Permanent Address District</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["paddressldis"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Current Address District</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["taddressldis"]; ?></h6>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Permanent Address Pin</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["paddresslpin"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Current Address Pin</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["taddresslpin"]; ?></h6>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Permanent Address State</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["paddresslstate"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Current Address State</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["taddresslstate"]; ?></h6>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Permanent Address Country</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["paddresslcountry"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Current Address Country</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["taddresslcountry"]; ?></h6>
                                                    </div>
                                                </div>
                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">SSC Details </h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Passing Year</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["ssc_passing_year"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Total</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["ssc_total"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Percentage</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["ssc_th_percentage"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Board</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["ssc_board"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">School</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["ssc_school"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Educational Gap</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["ssc_educational_gap"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">D2d or HSC</p>
                                                        <input type="radio" name="isd2d" id="HSC" <?php if ($row["isd2d"] == 0) echo "checked='checked'" ?> disabled />
                                                        <label for="HSC">HSC</label>

                                                        <input type="radio" name="isd2d" id="D2D" <?php if ($row["isd2d"] == 1) echo "checked='checked'" ?> disabled />
                                                        <label for="D2D">D2D</label>
                                                    </div>
                                                </div>
                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">HSC Details </h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Passing Year</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["hsc_passing_year"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Total Theory</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["hsc_th_marks"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Total Theory+Practical</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["hsc_th_p_marks"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Percentage Theory</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["hsc_th_percentage"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Percentage Theory+Practical</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["hsc_th_p_percentage"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Board</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["hsc_board"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">School</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["hsc_school"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Educational Gap</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["hsc_educational_gap"]; ?></h6>
                                                    </div>
                                                </div>
                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">D2D Details </h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Passing Year</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["d2d_passing_year"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">CGPA</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["d2d_cgpa"]; ?></h6>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">College</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["d2d_college"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 1</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["d2d_sem1"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 2</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["d2d_sem2"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 3</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["d2d_sem3"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 4</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["d2d_sem4"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 5</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["d2d_sem5"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 6</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["d2d_sem6"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Total Backlogs</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["d2d_backlogs"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Educational Gap</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["d2d_educational_gap"]; ?></h6>
                                                    </div>
                                                </div>
                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">BVM details</h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Passing Year</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_passing_year"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 1</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_sem1"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 2</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_sem2"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 3</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_sem3"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 4</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_sem4"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 5</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_sem5"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 6</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_sem6"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 7</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_sem7"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SEM 8</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_sem8"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Total Active Backlogs</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_active_backlog"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Total Dead Backlogs</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_dead_backlog"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Total Backlogs</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_total_backlog"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Total CPI</p>
                                                        <h6 class="text-muted f-w-400"><?php echo $row["bvm_cpi"]; ?></h6>
                                                    </div>
                                                </div>
                                                <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Documents</h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">SSC Marksheet</p>
                                                        <a href="http://localhost/tpc-main/admin/uploads/<?php echo $row["ssc_marksheet"]; ?>"><button class="text-center btn btn-success">View</button></a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">HSC Marksheet</p>
                                                        <a href="http://localhost/tpc-main/admin/uploads/<?php echo $row["hsc_marksheet"]; ?>"><button class="text-center btn btn-success">View</button></a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">D2D Marksheet</p>
                                                        <a href="http://localhost/tpc-main/admin/uploads/<?php echo $row["d2d_marksheet"]; ?>"><button class="text-center btn btn-success">View</button></a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">BVM Marksheet</p><a href="http://localhost/tpc-main/admin/uploads/<?php echo $row["bvm_marksheet"]; ?>"><button class="text-center btn btn-success">View</button></a>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Resume</p>
                                                        <a href="http://localhost/tpc-main/admin/uploads/<?php echo $row["resume"]; ?>"><button class="text-center btn btn-success">View</button></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./helper/sidebar.js"></script>

</body>

</html>