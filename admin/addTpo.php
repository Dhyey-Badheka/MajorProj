<?php

include("../database.php");
include("../helper/authorization.php");

if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}

$alreadyRegis = 0;
$regisSuccess = 0;
$regisError = 0;

$pass = "Tpo@1234";

// add new tpo
if (isset($_POST["add-tpo"])) {
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $name = $fname . " " . $lname;
    $email = $_POST["email"];
    $mobile = $_POST["mobile"];
    $aYear = $_POST["a-year"];
    $password = base64_encode(strrev(md5($pass)));

    // check if the email address is already registered 

    $checkRegis = $conn->query("SELECT * FROM tpo WHERE tpo_email='$email'");

    if ($checkRegis->num_rows) {
        $alreadyRegis = 1;
    }
    // if not then add the data and show the username and password
    else {
        $query = "INSERT INTO `tpo`(`tpo_name`, `tpo_email`, `tpo_number`, `academic_year`) VALUES ('$name','$email','$mobile','$aYear')";
        // echo $query;
        $insert = $conn->query($query);
        if ($conn->affected_rows) {
            $regisSuccess = 1;
        } else {
            $regisError = 1;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php if ($alreadyRegis == 1 || $regisError == 1) : ?>
        <meta http-equiv="refresh" content="3;url=http://localhost/tpc-main/admin/addTpo.php" />
    <?php endif ?>
    <link rel="stylesheet" href="./helper/addresult.css">
    <link rel="stylesheet" href="./helper/sidebar.css">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>Add tpo</title>

</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row d-flex justify-content-center">
                        <?php if ($regisSuccess == 1) : ?>
                            <p class="bg-success text-white text-center">Successfully Added tpo </p>
                        <?php endif ?>
                        <?php if ($regisError == 1) : ?>
                            <p class="bg-danger text-white text-center">Error in Adding tpo </p>
                        <?php endif ?>
                        <?php if ($alreadyRegis == 1) : ?>
                            <p class="bg-danger text-white text-center">tpo is already Registered </p>
                        <?php endif ?>
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Add tpo</h6>
                                        <form action="./addtpo.php" method="post">

                                            <div class="row ">
                                                <div class="col-sm-4">

                                                    <p class="m-b-5 col f-w-600 ">First Name</p>
                                                    <input type="text" class=" form-control" required name="fname" id="" value="" autocomplete="off" autofocus>
                                                </div>
                                                <div class="col-sm-4">

                                                    <p class="m-b-5 col f-w-600 ">Last Name</p>
                                                    <input type="text" class=" form-control" required name="lname" id="" value="">
                                                </div>
                                                <div class="col-sm-4">

                                                    <p class="m-b-5 col f-w-600 ">Email</p>
                                                    <input type="text" class=" form-control" required name="email" id="" value="">
                                                </div>
                                                <div class="col-sm-4">

                                                    <p class="m-b-5 col f-w-600 ">Mobile</p>
                                                    <input type="number" minlength="10" maxlength="10" class=" form-control" required name="mobile" id="" value="">
                                                </div>
                                                <div class="col-sm-4">

                                                    <p class="m-b-5 col f-w-600 ">Academic Year</p>
                                                    <input type="text" maxlength="4" required size="4" class=" form-control" name="a-year" id="" value="">
                                                </div>
                                                <div class="col-sm-12">
                                                    <input type="submit" value="Add TPO" name="add-tpo" class="  text-center btn btn-success m-5" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <?php if ($regisSuccess) : ?>
                            <div class="row d-flex flex-column">
                                <p class="m-b-5 col f-w-600">UserName : <span class="text-muted"><?php echo $email ?></span></p>
                                <p class="m-b-5 col f-w-600">Password : <span class="text-muted"><?php echo $pass ?></span></p>
                            </div>
                        <?php endif ?>
                    </div>
                    <!-- <button class="text-center btn btn-primary">Add </button> -->
                </div>
            </div>
        </main>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./helper/sidebar.js"></script>

</body>

</html>