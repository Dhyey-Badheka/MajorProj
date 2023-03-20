<?php

include("../database.php");
$password = $_POST["password"];
$password = base64_encode(strrev(md5($password)));
$admin = $_POST["admin"];
$id = $_POST["id"];
$matched = 0;
if ($admin == 1) {
    $check = $conn->query("SELECT tpo_password FROM tpo WHERE tpo_id='$id'");
    $answer = $check->fetch_assoc();
    if ($answer["tpo_password"] == $password) {
        $matched = 1;
    }
}
if ($admin == 2) {
    $check = $conn->query("SELECT tpf_password FROM tpf WHERE tpf_id='$id'");
    $answer = $check->fetch_assoc();
    if ($answer["tpf_password"] == $password) {
        $matched = 1;
    }
}
if ($admin == 3) {
    $check = $conn->query("SELECT tpc_password FROM tpc WHERE tpc_id='$id'");
    $answer = $check->fetch_assoc();
    if ($answer["tpc_password"] == $password) {
        $matched = 1;
    }
}

echo $matched;
