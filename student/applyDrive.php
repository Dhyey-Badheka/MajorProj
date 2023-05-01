<?php
include("../database.php");
// include("./helper/authorization.php");
if (isset($_GET["drive_id"]) && isset($_GET["stu_id"]) && isset($_GET["resumeType"])) {
    $result = applyForDrive($_GET["stu_id"], $_GET["drive_id"], $_GET["resumeType"], $conn);

    if ($result == 1) {

        echo "<script> alert('Applied for Drive Success! Further Details will be conveyed through mail.') </script>";
        echo "<script> window.location.href = 'http://localhost/tpc-main/student/drives.php'; </script>";
    } else {
        echo "<script> alert('Applied for Drive Failure! Ask concerned TPC for issue.') </script>";
        echo "<script> window.location.href = 'http://localhost/tpc-main/student/drives.php'; </script>";
    }
}

function checkProfile($stu_id)
{
    global $conn;
    $student_fetch = $conn->query("SELECT is_placed FROM student WHERE id_number = '$stu_id'");
    $studentDetails = $student_fetch->fetch_assoc();
    if ($studentDetails["is_placed"] == 0) {
        return 1;
    } else {
        return 0;
    }
}
function checkApplied($drive_id, $stu_id)
{
    global $conn;
    $query = "select pemail from student where id_number='$stu_id'";
    // echo $query;
    $student_fetch = $conn->query($query);
    $row = $student_fetch->fetch_assoc();
    $stu_email = $row["pemail"];
    // var_dump($adminUserEmail);
    $queryStu = "SELECT * FROM stu_drive WHERE stu_email_id = '$stu_email' and drive_id='$drive_id'";
    // echo $queryStu;
    // var_dump($queryStu);
    $check_result = $conn->query($queryStu);
    if ($check_result->num_rows == 1) {
        return 1;
    } else {
        return 0;
    }
}
function applyForDrive($stu_id, $drive_id, $resumeType, $conn)
{
    $driveInsert = $studentInsert = false;
    $drive = $conn->query("SELECT applied_stu FROM drive WHERE drive_id = '$drive_id'");
    $d = $drive->fetch_assoc();
    $dArray = json_decode($d["applied_stu"], true);
    array_push($dArray, $stu_id);
    $dArray = json_encode($dArray);
    $insertStudent = $conn->query("UPDATE drive SET applied_stu = '$dArray' WHERE drive_id = '$drive_id'");
    $check_result = $conn->query($insertStudent);
    if ($conn->affected_rows) {
        $studentInsert = true;
    }
    $query = "select pemail from student where id_number='$stu_id'";
    $student_fetch = $conn->query($query);
    $row = $student_fetch->fetch_assoc();
    $stu_email = $row["pemail"];
    $insertDrive = $conn->query("INSERT INTO `stu_drive` (`stu_email_id`, `drive_id`, `resumeType`, `timestamp`) VALUES ('$stu_email', '$drive_id', '$resumeType', current_timestamp());");
    $check_result = $conn->query($insertDrive);
    if ($conn->affected_rows) {
        $driveInsert = true;
    }
    if ($driveInsert && $studentInsert) {
        return 1;
    } else {
        return 0;
    }
}
function checkEligiblity($drive_id, $stu_id)
{
    global $conn;
    $drive_fetch = $conn->query("SELECT * FROM drive WHERE drive_id = '$drive_id'");
    $driveDetails = $drive_fetch->fetch_assoc();
    $student_fetch = $conn->query("SELECT * FROM student_academic,student WHERE s_id = '$stu_id' and id_number='$stu_id'");
    $studentDetails = $student_fetch->fetch_assoc();
    $isEligible = 0;
    if ((floatval($driveDetails["hsccriteria"]) <= floatval($studentDetails["hsc_th_p_percentage"]))
        && (floatval($driveDetails["ssccriteria"]) <= floatval($studentDetails["ssc_th_percentage"]))
        && (floatval($driveDetails["cpicriteria"]) <= floatval($studentDetails["bvm_cpi"]))
        && (floatval($driveDetails["total_backlog"]) >= floatval($studentDetails["bvm_total_backlog"]))
        && (floatval($driveDetails["active_backlog"]) >= floatval($studentDetails["bvm_active_backlog"]))
        && ($studentDetails["is_placed"] == "0")
        && ($driveDetails["inProcess"] == "1")
    ) {
        $isEligible = 1;
    }

    return $isEligible;
}
