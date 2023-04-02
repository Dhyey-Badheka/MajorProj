<?php

// Defining the credentials for the database
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "tpc";

// Connection Object
$conn = new mysqli($serverName, $userName, $password, $dbName);

// If error occurs then display the error
if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
}


// add the annoucement

// $insertSuccess = 0;
// $insertFailure = 0;


// if (isset($_POST["add-annouce"])) {

//     $deptEligible = array();
//     foreach ($_POST["eligible_dept"] as $selected) {
//         if ($selected == 0) {
//             for ($i = 1; $i <= 8; $i++) {
//                 array_push($deptEligible, intval($i));
//             }
//             break;
//         } else {
//             array_push($deptEligible, intval($selected));
//         }
//     }
// $deptEligible = array($deptEligible);
// $deptEligible = json_encode($deptEligible);
// $applied_stu = array('19it450', '19it451', '19it452', '19it453');
// $applied_stu = json_encode($applied_stu);
// $sql = "update announcement set applied_stu='$applied_stu' where aid=1;";
// $search = $conn->query($sql);
// $search = $conn->query("select applied_stu from announcement where aid=1;");
// $row = $search->fetch_assoc();
// $applied_stu = $row["applied_stu"];
// $applied_stu = json_decode($applied_stu, true);
// // var_dump($applied_stu);
// // $arr = ($row["applied_stu"]);
// // var_dump($arr);
// // $search = $conn->query("select name from placed_stu where dept_id in (select dept from announcement where aid=1);");
// // $ind = '(' . implode(',', $applieddept) . ')';
// $sql = "select * from placed_stu where LOWER(stuid) in ('" . implode('\',\'', $applied_stu)  . "');";
// echo "<br>" . $sql . "<br>";
// $search = $conn->query($sql);
// while ($row = $search->fetch_assoc()) {
//     echo $row["Name"] . $row["email"] . "<br>";
// }


$query = "SELECT * FROM `drive` , `company` where drive.comp_id=company.comp_id;";
$search = $conn->query($query);
$row = $search->fetch_assoc();
$applied_stu = $row["applied_stu"];
$drive_id = $row["drive_id"];
var_dump($applied_stu);
var_dump($drive_id);
// $applied_stu = str_replace('"', '', $applied_stu);
$applied_stu = json_decode($applied_stu, true);
var_dump($applied_stu);
// echo implode('\',\'', $applied_stu);
// $sql = "select * from drive,company where LOWER(id_number) in ('" . implode('\',\'', $applied_stu)  . "');";         
// $sql = "select * from student,drive,company where '19it450' in ('19it450','19cp015') and drive_id='1' and company.comp_id=drive.comp_id;";
$sql = "select * from student,drive,company where '19it450' in ('" . implode('\',\'', $applied_stu)  . "') and drive_id='$drive_id' and company.comp_id=drive.comp_id";
echo "<br>" . $sql . "<br>";
$search1 = $conn->query($sql);
while ($row1 = $search1->fetch_assoc()) {
    echo $row1["comp_name"] . $row1["job_role"] . "<br>";
}
