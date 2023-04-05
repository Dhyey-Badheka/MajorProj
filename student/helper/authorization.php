<?php

include("../database.php");
header('Access-Control-Allow-Origin: *');

session_start();

// Check is the admin has login or not
if (isset($_SESSION["studentUserId"])) {
    $adminUserEmail = $_SESSION["email"];
    $adminUserAuth = $_SESSION["auth"];
    if ($reqFor == "add") {
        $check_query = "SELECT * FROM student WHERE pemail = '$adminUserEmail' AND oauth_uid='$adminUserAuth'";
    } else if ($reqFor == "show") {
        $check_query = "SELECT * FROM student WHERE pemail = '$adminUserEmail' AND oauth_uid='$adminUserAuth' and is_approved='0' and is_registered='1'";
    } else {
        $check_query = "SELECT * FROM student WHERE pemail = '$adminUserEmail' AND oauth_uid='$adminUserAuth' and is_registered='1' and is_approved='1'";
    }
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows == 1) {
        $access = 1;
    } else {
        echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
    }
} else {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}
