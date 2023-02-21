<?php

include("../database.php");

// $id_number = $_GET["id"];





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/sidebar.css">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>View Student</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row  d-flex justify-content-center">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                    <div class="card-block text-center text-white">
                                        <div class="m-b-25">
                                            <img src="http://localhost/tpc-main/images/Dhyey.png" class="img-radius" alt="User-Profile-Image">
                                        </div>
                                        <h2 class="f-w-600">Dhyey Badheka</h2>
                                        <p>19IT450@bvmengineering.ac.in</p>
                                        <p>19IT450</p>
                                        <p>Information Technology</p>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Change Password</h6>
                                        <div class="row m-b-20">
                                            <div class="col-sm-6 ">
                                                <p class="m-b-5 f-w-600">Current Password</p>
                                                <input type="password" class="m-b-5 form-control" name="" id="" value="f_name">
                                            </div>
                                            <div class="col-sm-6">
                                                <p class="m-b-5 f-w-600">New Password</p>
                                                <input type="password" class="m-b-5 form-control" name="" id="" value="m_name">
                                            </div>
                                        </div>
                                        <div class="row m-b-20">
                                            <div class="col-sm-6">
                                                <p class="m-b-5 f-w-600">Confirm Password</p>
                                                <input type="password" class="m-b-5 form-control" name="" id="" value="l_name">
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>

                        </div>
                        <button class="text-center btn btn-primary">Update and Save</button>
                    </div>
        </main>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./helper/sidebar.js"></script>

</body>

</html>