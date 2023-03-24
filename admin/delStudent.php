<?php

include("../database.php");
include("../helper/authorization.php");
if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}

$id = "";


if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $delete = $conn->query("DELETE FROM student_academic WHERE s_id = '$id'");
    $delete = $conn->query("DELETE FROM student_document WHERE s_id = '$id'");
    $delete = $conn->query("DELETE FROM student WHERE id_number = '$id'");
    if ($conn->affected_rows) {
        echo "<script> window.location.href = 'http://localhost/tpc-main/admin/student.php'; </script>";
    }
}
