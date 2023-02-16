<?php

include("./database.php");



if(isset($_POST["login"]))
{
    $username = strtolower($_POST["username"]) ;
    $password = base64_encode(strrev(md5($_POST["password"])));

    $check_query = "SELECT * FROM student WHERE id_number = '$username' AND password = '$password'";
    $check_result = $conn->query($check_query);

    if($check_result->num_rows == 1)
    {
        header("Location: ./student/index.php");
        exit();

    }
    else{
        echo '<script> alert("Credentials Does Not Match. Please Check!! ") </script>';

        //  and redirect to the login page
        echo '<script> window.location.href="./login.php" </script>';
    }

}
