<?php

include("./database.php");
session_start();

if (isset($_POST["login"])) {
    $username = strtolower($_POST["email"]);
    $password = base64_encode(strrev(md5($_POST["password"])));
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);
    echo "<script>console.log('$username')</script>";
    echo "<script>console.log('$password')</script>";


    $typeOfUser = $_POST["typeOfUser"];

    // if the user is admin then check for the type of admin 
    if ($typeOfUser == 3) {
        $typeOfUser = $_POST["typeOfAdmin"];
    }

    // Flow of data 
    // 1) check for the user in the respective table
    // 2) if the user credentials matches 
    // 2.1) intialize the session variables according to the user 
    // 2.2) redirect to the respective dashboard according to the user
    // 3) else show the error and stay on the login page

    // if the user is student then search in the student table for the credentials



    if (preg_match('/@bvmengineering.ac.in$/', $username)) {
        if ($typeOfUser == 4) {
            $check_query = "SELECT * FROM tpo WHERE tpo_email = '$username' AND tpo_password = '$password'";
        } else if ($typeOfUser == 5) {
            $check_query = "SELECT * FROM tpf WHERE tpf_email = '$username' AND tpf_password = '$password'";
        } else if ($typeOfUser == 6) {
            $check_query = "SELECT * FROM tpc WHERE tpc_email = '$username' AND tpc_password = '$password'";
        } else if ($typeOfUser == 1) {
            $check_query = "SELECT * FROM student WHERE pemail = '$username' AND password = '$password'";
        }
        $check_result = $conn->query($check_query);
        if ($check_result->num_rows == 1 && $typeOfUser == 4) {
            $row = $check_result->fetch_assoc();
            $_SESSION["admin"] = "TPO";
            $_SESSION["adminUserName"] = $row["tpo_name"];
            $_SESSION["access"] = 1;
            echo "<script> window.location.href = './admin/index.php'; </script>";
        } else if ($check_result->num_rows == 1 && $typeOfUser == 5) {
            $row = $check_result->fetch_assoc();
            if ($row["isActive"] == "1") {
                $_SESSION["admin"] = "TPF";
                $_SESSION["adminUserName"] = $row["tpf_name"];
                $_SESSION["access"] = 2;
                $_SESSION["adminDept"] = $row["tpf_dept_id"];
                // var_dump($_SESSION);
                echo "<script> window.location.href = './admin/index.php'; </script>";
            }
        } else if ($check_result->num_rows == 1 && $typeOfUser == 6) {
            $row = $check_result->fetch_assoc();
            if ($row["isActive"] == "1") {
                $_SESSION["admin"] = "TPC";
                $_SESSION["adminUserName"] = $row["tpc_name"];
                $_SESSION["access"] = 3;
                $_SESSION["adminDept"] = $row["tpc_dept_id"];
                echo "<script> window.location.href = './admin/index.php'; </script>";
            }
        } else if ($check_result->num_rows == 1 && $typeOfUser == 1) {
            $_SESSION["studentUserId"] = $username;
            echo "<script> window.location.href = './student/index.php'; </script>";
        } else {
            echo '<script> alert("Credentials Does Not Match. Please Check!! ") </script>';
            echo '<script> window.location.href="./login.php" </script>';
        }
    } else {
        echo '<script> alert("Please Login from Email Address with bvmengineeing.ac.in !! ") </script>';
        echo '<script> window.location.href="./login.php" </script>';
    }
}
