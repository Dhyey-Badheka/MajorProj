<?php
include("../database.php");
include("../helper/authorization.php");

if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}
mysqli_select_db($conn, 'tpc');
$id = $_GET["ViewId"];

$sql = "SELECT drive_id FROM `result` where result_id='$id'";
$search = mysqli_query($conn, $sql);
while ($row = $search->fetch_assoc()) {
    $drived_id = $row["drive_id"];
}
$sql = "SELECT job_role,comp_name FROM `drive`,`company` where drive_id='$drived_id' and drive.comp_id=company.comp_id";
$search = mysqli_query($conn, $sql);
while ($row = $search->fetch_assoc()) {
    $columnHeader = '';
    $columnHeader = "\t" . "Birla Vishvakarma Mahavidyalaya" .   "\n"  . "\t" . "An Autonomous Institution" .   "\n" . "\t" . "VallabhVidyanagar-Anand 388120" .   "\n" . "\t" . $row["comp_name"] . " - " . $row["job_role"] .   "\n"  . "\n"  . "Sr. No." . "\t" . "Student ID" . "\t" . "Student Name" . "\t" . "Student Email" . "\t" . "Department";
}

$setData = '';
$sql = "select student_placed from result where result_id='$id'";
$search = $conn->query($sql);
$row = $search->fetch_assoc();
$applied_stu = $row["student_placed"];
// var_dump($applied_stu);
// $applied_stu = str_replace('"', '', $applied_stu);
$applied_stu = json_decode($applied_stu, true);
// var_dump($applied_stu);
$sql = "select ROW_NUMBER() OVER (ORDER BY id_number),id_number,concat(first_name,' ',middle_name,' ',last_name),pemail,dept_name from student,Department where LOWER(id_number) in ('" . implode('\',\'', $applied_stu)  . "') and student.dept_id=department.dept_id;";
// echo "<br>" . $sql . "<br>";
// $search = $conn->query($sql);
// while ($row = $search->fetch_assoc()) {
$setRec = mysqli_query($conn, $sql);
while ($rec = mysqli_fetch_row($setRec)) {
    $rowData = '';
    foreach ($rec as $value) {
        $value = '"' . $value . '"' . "\t";
        $rowData .= $value;
    }
    $setData .= trim($rowData) . "\n";
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Result_Detail.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo ucwords($columnHeader) . "\n" . $setData . "\n";
