<?php
include("./database.php");


// Session
session_start();
function alreadyRegis()
{

    // if user found in the database then alert the user
    echo '<script> alert(" User is already Registered. Please Login!!") </script>';

    //  and redirect to the login page
    echo '<script> window.location.href="./login.php" </script>';
}

// Taking the values from the form 
if (isset($_POST["register"])) {
    // Values from the Register Form
    $email = $_POST["email"];
    $password = $_POST["password"];
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $user_type = $_POST["user_type"];
    $id_number = $_POST["id"];
    $dept = $_POST["department"];

    // Encrypting the password with MD5 and base64_encode
    $password = base64_encode(strrev(md5($password)));

    //check if the email exists in the system or not
    if ($user_type == "TPO") {
        $check = "SELECT pemail FROM TPO WHERE pemail = '$email'";
        $check_result = $conn->query($check);
        if ($check_result->num_rows == 0) {
            $add_query = "INSERT INTO `tpo`(`password`, `first_name`, `mobile`, `pemail`) VALUES ('$password','$name','$mobile','$email')";
            if ($conn->query($add_query)) {
                header("Location: showUserDetails.php?user_id=$pemail");
            } else {
                echo "Error" . "<br>";
            }
        } else {
            alreadyRegis();
        }
    } else if ($user_type == "TPF") {
        $check = "SELECT pemail FROM TPF WHERE pemail = '$email'";
        $check_result = $conn->query($check);
        if ($check_result->num_rows == 0) {
            if ($dept >= 1 && $dept <= 8) {
                $add_query = "INSERT INTO `tpf`(`password`, `first_name`, `mobile`, `pemail`, `dept_id`) VALUES ('$password','$name','$mobile','$email','$dept')";
                if ($conn->query($add_query)) {
                    header("Location: showUserDetails.php?user_id=$pemail");
                } else {
                    echo "Error" . "<br>";
                }
            } else {
                echo "Error" . "<br>";
            }
        } else {
            alreadyRegis();
        }
    } else if ($user_type == "TPC") {
        $check = "SELECT pemail FROM TPC WHERE pemail = '$email'";
        $check_result = $conn->query($check);
        if ($check_result->num_rows == 0) {
            if ($dept >= 1 && $dept <= 8 && $id_number != null) {
                $add_query = "INSERT INTO `tpc`(`id_number`, `password`, `first_name`, `mobile`, `pemail`, `dept_id`) VALUES ('$id_number','$password','$name','$mobile','$email','$dept')";
                if ($conn->query($add_query)) {
                    header("Location: showUserDetails.php?user_id=$id_number");
                } else {
                    echo "Error" . "<br>";
                }
            } else {
                echo "Error" . "<br>";
            }
        } else {
            alreadyRegis();
        }
    } else {
        $check = "SELECT pemail FROM student WHERE pemail = '$email'";
        $check_result = $conn->query($check);
        if ($check_result->num_rows == 0) {
            if ($dept >= 1 && $dept <= 8 && $id_number != null) {
                $add_query = "INSERT INTO `student`(`id_number`, `password`, `first_name`, `mobile`, `pemail`, `dept_id`) VALUES ('$id_number','$password','$name','$mobile','$email','$dept')";
                if ($conn->query($add_query)) {
                    header("Location: showUserDetails.php?user_id=$id_number");
                } else {
                    echo "Error" . "<br>";
                }
            } else {
                echo "Error" . "<br>";
            }
        } else {
            alreadyRegis();
        }
    }
}
