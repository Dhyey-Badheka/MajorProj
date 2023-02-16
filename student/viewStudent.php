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
                        <div class="">
                            <div class="card user-card-full">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col-sm-4 bg-c-lite-green user-profile">
                                        <div class="card-block text-center text-white">
                                            <div class="m-b-25">
                                                <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image">
                                            </div>
                                            <p>
                                                <span class="badge text-white badge-lg badge-dot">
                                                    <i class="bg-warning"></i> Pending
                                                </span>
                                            </p>
                                            <h2 class="f-w-600">Dhyey Badheka</h2>
                                            <p>19IT450</p>
                                            <p>Regular</p=>
                                            <p>Computer</p>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="card-block">
                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Personal Information</h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6 ">
                                                    <p class="m-b-5 f-w-600">First Name</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="f_name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Middle Name</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="m_name">
                                                </div>
                                            </div>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Last Name</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="l_name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Phone</p>
                                                    <input type="number" class="m-b-5 form-control" name="" id="" value="7984528154">
                                                </div>
                                            </div>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Email</p>
                                                    <input type="email" class="m-b-5 form-control" name="" id="" value="badheka15@gmail.com">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Gender</p>
                                                    <p> <input type="radio" id="Male" name="gender" value="male" checked>Male</input>
                                                        <input type="radio" id="Female" name="gender" value="female">Female</input>
                                                    </p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Linkedin URL</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="www.linked.in.com">
                                                </div>
                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Father's Information</h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">First Name</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="f_name">
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Last Name</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="l_name">
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Father's Occupation</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="f_occu">
                                                </div>
                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Mother's Information</h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">First Name</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="f_name">
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Last Name</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="l_name">
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Mother's Occupation</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="m_occu">
                                                </div>
                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">SSC Details </h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">Passing Year</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="2019">
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">Percentile</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="99%">
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">Percentage</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="99%">
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">out of 600</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="550">
                                                </div>
                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">D2D Details </h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Passing Year</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="2019">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">CGPA</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="9.33">
                                                </div>

                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">HSC Details </h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">Passing Year</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="2019">
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">Percentile</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="93%">
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">Percentage</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="93%">
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">out of 600</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="567">
                                                </div>
                                            </div>
                                            <div class="row m-b-20">
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Physics</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="89">
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Chemistry</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="78">
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Maths</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="29">
                                                </div>

                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Documents </h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-4">
                                                    <button class="text-center btn btn-success">Upload</button>
                                                    <a href="http://localhost/tpc-main/demopdf/1.pdf">
                                                        <p class="m-b-5 f-w-600">Aadhar Card</p>
                                                    </a>

                                                </div>
                                                <div class="col-sm-4">
                                                    <button class="text-center btn btn-success">Upload</button> <a href="http://localhost/tpc-main/demopdf/1.pdf">
                                                        <p class="m-b-5 f-w-600">PAN Card</p>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4">
                                                    <button class="text-center btn btn-success">Upload</button> <a href="http://localhost/tpc-main/demopdf/1.pdf">
                                                        <p class="m-b-5 f-w-600">Resume</p>
                                                    </a>
                                                </div>

                                            </div>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <button class="text-center btn btn-success">Upload</button> <a href="http://localhost/tpc-main/demopdf/1.pdf">
                                                        <p class="m-b-5 f-w-600">SSC Marksheet</p>
                                                    </a>
                                                </div>
                                                <div class="col-sm-6">
                                                    <button class="text-center btn btn-success">Upload</button> <a href="http://localhost/tpc-main/demopdf/1.pdf">
                                                        <p class="m-b-5 f-w-600">HSC Marksheet</p>
                                                    </a>
                                                </div>


                                            </div>

                                        </div>

                                    </div>
                                    <button class="text-center btn btn-primary">Update and Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

    </div>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./helper/sidebar.js"></script>

</body>

</html>