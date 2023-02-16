<?php
include("./database.php");


// Taking the values from the form 
if (isset($_POST["register"])) {
    // Values from the Register Form
    $is_d2d = $_POST["typeStudent"] == 1 ? 0 : 1;
    $id_number = $_POST["id"];
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $password = $_POST["password"];
    $dept = $_POST["department"];
    $gender = $_POST["gender"];

    // Encrypting the password with MD5 and base64_encode
    $password = base64_encode(strrev(md5($password)));

    //check if the id number exists in the system or not
    $check = "SELECT id_number FROM student WHERE id_number = '$id_number'";
    $check_result = $conn->query($check);


    // if user id not found then add the user
    if ($check_result->num_rows == 0) {

        $add_query = "INSERT INTO `student`(`id_number`, `password`, `gender`, `mobile`, `email`, `dept_id`,`is_d2d`) VALUES ('$id_number','$password','$gender','$mobile','$email','$dept','$is_d2d')";

        // run the query 

        if ($conn->query($add_query)) {
            // if it is succesful then redirect to another page with user_id
            header("Location: showUserDetails.php?user_id=$id_number");
        } else {
            // else display the error 
            echo "Error" . "<br>" ;
        }
    } else {
        // if user found in the database then alert the user
        echo '<script> alert(" User is already Registered. Please Login!!") </script>';

        //  and redirect to the login page
        echo '<script> window.location.href="./login.php" </script>';
    }
}
