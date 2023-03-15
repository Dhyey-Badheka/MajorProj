<?php

include("../database.php");

session_start();

// Check is the admin has login or not
if (isset($_SESSION["admin"])) {
    $adminUser = $_SESSION["adminUserName"];
    $access = $_SESSION["access"];
} else {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}
