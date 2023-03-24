<?php
include("../database.php");
include("../helper/authorization.php");

if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}
mysqli_select_db($conn, 'tpc');
$id = $_GET["id"];
$sql = "SELECT job_role,comp_name FROM `drive`,`company` where drive_id='$id' and drive.comp_id=company.comp_id";
// $setRec = mysqli_query($conn, $sql);
while ($row = $search->fetch_assoc()) {
    $columnHeader = '';
    $columnHeader = "\t" . "Birla Vishvakarma Mahavidyalaya" .   "\n"  . "\t" . "An Autonomous Institution" .   "\n" . "\t" . "VallabhVidyanagar-Anand 388120" .   "\n" . "\t" . $row["comp_name"] . " - " . $row["job_role"] .   "\n"  . "\n"  . "Sr. No." . "\t" . "Student ID" . "\t" . "Student Name" . "\t" . "Phone" . "\t" . "Email" . "\t" . "Gender" . "\t" . "SSC %" . "\t" . "HSC %" . "\t" . "D2D CPI" . "\t" . "Current CPI" . "\t" . "Active Backlogs";
}

$setData = '';
$sql = "SELECT applied_stu FROM `drive` where drive_id='$id'";
while ($row = $search->fetch_assoc()) { 
    $arr=$row["applied_stu"];
    $arr_str = implode(" , ", $arr);


    $sql = "SELECT * from student where ";    
}
// $setRec = mysqli_query($conn, $sql);
while ($rec = mysqli_fetch_row($setRec)) {
    $rowData = '';
    foreach ($rec as $value) {
        $value = '"' . $value . '"' . "\t";
        $rowData .= $value;
    }
    $setData .= trim($rowData) . "\n";
}

header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=User_Detail.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo ucwords($columnHeader) . "\n" . $setData . "\n";
