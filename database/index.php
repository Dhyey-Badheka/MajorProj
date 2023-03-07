<?php

include("../database.php");
include("../database/admin.php");
include("../database/company.php");
include("../database/tpo.php");
include("../database/tpc.php");
include("../database/tpf.php");
include("../database/student.php");
include("../database/student_academic.php");
include("../database/student_document.php");
include("../database/annoucements.php");
include("../database/drive.php");
include("../database/result.php");

// $result["message"] = "";
// // DEPARTMENT TABLE
// if (isset($_POST["create-dept"])) {
//     $result = json_decode(create_dept($conn), true);
//     echo $result["message"];
// }
// if (isset($_POST["add-dept"])) {
//     $result = json_decode(insert_data_dept($conn), true);
//     echo $result["message"];
// }


// // COMPANY TABLE
// if (isset($_POST["create-company"])) {
//     $result = json_decode(create_company($conn), true);
// }
// if (isset($_POST["add-company"])) {
//     $result = json_decode(insert_data_company($conn), true);
// }


// // TPO TABLE
// if (isset($_POST["create-tpo"])) {
//     $result = json_decode(create_tpo($conn), true);
// }
// if (isset($_POST["add-tpo"])) {
//     $result = json_decode(insert_data_tpo($conn), true);
// }


// // TPC TABLE
// if (isset($_POST["create-tpc"])) {
//     $result = json_decode(create_tpc($conn), true);
// }
// if (isset($_POST["add-tpc"])) {
//     $result = json_decode(insert_data_tpc($conn), true);
// }


// // TPF TABLE
// if (isset($_POST["create-tpf"])) {
//     $result = json_decode(create_tpf($conn), true);
// }
// if (isset($_POST["add-tpf"])) {
//     $result = json_decode(insert_data_tpf($conn), true);
// }


// // Student TABLE
// if (isset($_POST["create-stu"])) {
//     $result = json_decode(create_student($conn), true);
// }
// if (isset($_POST["add-stu"])) {
//     $result = json_decode(insert_data_student($conn), true);
// }


// // Student Academic TABLE
// if (isset($_POST["create-aca"])) {
//     $result = json_decode(create_student_academic($conn), true);
// }
// if (isset($_POST["add-aca"])) {
//     $result = json_decode(insert_data_student_academic($conn), true);
// }


// // Student Document TABLE
// if (isset($_POST["create-doc"])) {
//     $result = json_decode(create_student_document($conn), true);
// }
// if (isset($_POST["add-doc"])) {
//     $result = json_decode(insert_data_student_document($conn), true);
// }


// // Student Placed TABLE
// if (isset($_POST["create-pla"])) {
//     $result = json_decode(create_student_placed($conn), true);
// }
// if (isset($_POST["add-pla"])) {
//     $result = json_decode(insert_data_student_placed($conn), true);
// }


// // Result TABLE
// if (isset($_POST["create-res"])) {
//     $result = json_decode(create_result($conn), true);
// }
// if (isset($_POST["add-res"])) {
//     $result = json_decode(insert_data_result($conn), true);
// }


// // Annoucements TABLE
// if (isset($_POST["create-ann"])) {
//     $result = json_decode(create_annoucements($conn), true);
// }
// if (isset($_POST["add-ann"])) {
//     $result = json_decode(insert_data_annoucements($conn), true);
// }


// // Annoucements TABLE
// if (isset($_POST["create-drive"])) {
//     $result = json_decode(create_drive($conn), true);
// }
// if (isset($_POST["add-drive"])) {
//     $result = json_decode(insert_data_drive($conn), true);
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Database</title>
</head>

<body>
    <h5><?php echo $result["message"]; ?></h5>

    <h3>Department</h3>
    <form action="./index.php" method="post">
        <input type="submit" value="Create Department" name="create-dept">
        <input type="submit" value="Department Data" name="add-dept">
    </form>
    <h3>Company</h3>
    <form action="./index.php" method="post">
        <input type="submit" value="Create Company" name="create-company">
        <input type="submit" value="Company Data" name="add-company">
    </form>
    <h3>TPO</h3>
    <form action="./index.php" method="post">
        <input type="submit" value="Create TPO" name="create-tpo">
        <input type="submit" value="TPO Data" name="add-tpo">
    </form>
    <h3>TPC</h3>
    <form action="./index.php" method="post">
        <input type="submit" value="Create TPC" name="create-tpc">
        <input type="submit" value="TPC Data" name="add-tpc">
    </form>
    <h3>TPF</h3>
    <form action="./index.php" method="post">
        <input type="submit" value="Create TPF" name="create-tpf">
        <input type="submit" value="TPF Data" name="add-tpf">
    </form>
    <h3>Student</h3>
    <form action="./index.php" method="post">
        <input type="submit" value="Create Student" name="create-stu">
        <input type="submit" value="Student Data" name="add-stu">
    </form>
    <h3>Student Academic</h3>
    <form action="./index.php" method="post">
        <input type="submit" value="Create Academic" name="create-aca">
        <input type="submit" value="Academic Data" name="add-aca">
    </form>
    <h3>Student Document</h3>
    <form action="./index.php" method="post">
        <input type="submit" value="Create Document" name="create-doc">
        <input type="submit" value="Document Data" name="add-doc">
    </form>
    <h3>Student Placed</h3>
    <form action="./index.php" method="post">
        <input type="submit" value="Create Placed" name="create-pla">
        <input type="submit" value="Placed Data" name="add-pla">
    </form>
    <h3>Results</h3>
    <form action="./index.php" method="post">
        <input type="submit" value="Create Results" name="create-res">
        <input type="submit" value="Results Data" name="add-res">
    </form>
    <h3>Drive</h3>
    <form action="./index.php" method="post">
        <input type="submit" value="Create Drive" name="create-drive">
        <input type="submit" value="Drive Data" name="add-drive">
    </form>
    <h3>Annoucements</h3>
    <form action="./index.php" method="post">
        <input type="submit" value="Create Annoucements" name="create-ann">
        <input type="submit" value="Annoucements Data" name="add-ann">
    </form>
</body>

</html>