<?php

include("./database.php");



if (isset($_POST["login"])) {
    $username = strtolower($_POST["email"]);
    $password = base64_encode(strrev(md5($_POST["password"])));
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    if (isset($_POST["user_type"])) {
        $user_type = $_POST["user_type"];
    } else {
        echo '<script> alert("Please Select your role!! ") </script>';
        echo '<script> window.location.href="./login.php" </script>';
    }
    if ($user_type == 0) {
        $check_query = "SELECT * FROM admin WHERE tpo_email = '$username' AND password = '$password'";
    } else if ($user_type == 1) {
        $check_query = "SELECT * FROM tpf WHERE tpf_email = '$username' AND password = '$password'";
    } else if ($user_type == 2) {
        $check_query = "SELECT * FROM tpc WHERE tpc_email = '$username' AND password = '$password'";
    } else if ($user_type == 3) {
        $check_query = "SELECT * FROM student WHERE pemail = '$username' AND password = '$password'";
    }
    $check_result = $conn->query($check_query);
    if ($check_result->num_rows == 1 && $user_type == 0) {
        header("Location: ./tpo");
        exit();
    } else if ($check_result->num_rows == 1 && $user_type == 1) {
        header("Location: ./tpf");
        exit();
    } else if ($check_result->num_rows == 1 && $user_type == 2) {
        header("Location: ./tpc");
        exit();
    } else if ($check_result->num_rows == 1 && $user_type == 3) {
        header("Location: ./student");
        exit();
    } else {
        echo '<script> alert("Credentials Does Not Match. Please Check!! ") </script>';

        //  and redirect to the login page
        echo '<script> window.location.href="./login.php" </script>';
    }
}
