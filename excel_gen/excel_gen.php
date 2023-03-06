<?php
// Defining the credentials for the database
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "demodb";
$conn = new mysqli($serverName, $userName, $password);
mysqli_select_db($conn, 'demodb');
$sql = "SELECT * FROM `placed_stu`";
$setRec = mysqli_query($conn, $sql);
$columnHeader = '';
$columnHeader = "\t" . "Birla Vishvakarma Mahavidyalaya" .   "\n"  . "\t" . "An Autonomous Institution" .   "\n" . "\t" . "VallabhVidyanagar-Anand 388120" .   "\n"  . "\n"  . "Sr. No." . "\t" . "Student ID" . "\t" . "Student Name" . "\t" . "Department" . "\t" . "Salary" . "\t" . "Company";
$setData = '';
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
