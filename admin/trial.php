<?php
include("../database.php");

$id = 2;
// $insert = $conn->query("SELECT applied_stu FROM `drive` where drive_id='$id'");
// $insert = $conn->query("select student.first_name,student.pemail from student where dept_id in (select dept from announcement where announcement_id=2);");
$insert = $conn->query("select dept from announcement where announcement_id=2;");
while ($row = $insert->fetch_assoc()) {
    $deptEligible = array($row["dept"]);
    // echo $deptEligible[0][1];
    $str = '(';
    for ($i = 1; $i < strlen($deptEligible[0]); $i += 2) {
        $str .= $deptEligible[0][$i] . ",";
    }
    $str .= ")";
    $str = str_replace(",)", ")", $str);
    echo $str;
    $search = $conn->query("select student.first_name,student.pemail from student where dept_id in $str");
    while ($row1 = $search->fetch_assoc()) {
        echo $row1["first_name"];
        echo $row1["pemail"];
        // echo $row["dept"];
    }
    // $deptEligible = json_encode($deptEligible);
    // echo $deptEligible;
}
