<?php

include("../database.php");

$id_number = $_GET["id"];





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
                                            <!-- <h6 class="f-w-600">Dhyey Badheka</h6> -->
                                            <p> <a href="#" class="text-reset">Crest Data Systems</a> </p>
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Ahmedabad</p>
                                                    <!-- <h6 class="f-w-400">f_name</h6> -->
                                                </div>
                                                <!-- <div class="col-sm-5">
                                                    <p class="m-b-10 f-w-600"></p>
                                                    <h6 class="f-w-400">f_name</h6> 
                                                </div> -->
                                                <div class="col-sm-6">
                                                    <a href="#" class="text-reset">
                                                        <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col-sm-6">
                                                    <form action="./companyAction.php" method="post">
                                                        <input type="hidden" name="approve" value="id">
                                                        <button class="btn-primary btn-success text-dark fw-bolder   p-2 rounded" type="submit">Approve</button>
                                                    </form>
                                                </div>
                                                <div class="col-sm-6">
                                                    <form action="./companyAction.php" method="post">
                                                        <input type="hidden" name="remarks" value="id">
                                                        <button class="btn-primary btn-warning text-dark fw-bolder   p-2 rounded" type="submit">Remarks</button>
                                                    </form>
                                                </div>

                                            </div>



                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="card-block">
                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Company Information</h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-4 ">
                                                    <p class="m-b-5 f-w-600">Company Name</p>
                                                    <!-- <input type="text" class="form-control" name="" id="" value="hi"> -->
                                                    <h6 class="text-muted f-w-400">c_name</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Location</p>
                                                    <h6 class="text-muted f-w-400">location</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">URL</p>
                                                    <a href="#" class="text-reset">
                                                        <h6 class="text-muted f-w-400">www.crestdatasystem.in</h6>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Last Name</p>
                                                    <h6 class="text-muted f-w-400">l_name</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Phone</p>
                                                    <h6 class="text-muted f-w-400">98979989898</h6>
                                                </div>
                                            </div>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Email</p>
                                                    <h6 class="text-muted f-w-400">jimis@gmaiul.com</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Gender</p>
                                                    <h6 class="text-muted f-w-400">Male</h6>
                                                </div>
                                            </div> -->
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Job Description</h6>

                                            <!-- Will get in the loop for number of job roles -->
                                            <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Job Title</p>
                                                    <h6 class="text-muted f-w-400">j_title</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">CTC</p>
                                                    <h6 class="text-muted f-w-400">500000</h6>
                                                </div>
                                            </div>
                                            <div class="row m-b-20">
                                                <div class="col-sm-12">
                                                    <p class="m-b-5 f-w-600">Job Decription</p>
                                                    <h6 class="text-muted f-w-400">lorem lorem lorem lorem lorem lorem</h6>
                                                </div>
                                            </div>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">No. of vacancies</p>
                                                    <h6 class="text-muted f-w-400">5</h6>
                                                </div>
                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600"></h6>
                                            <!-- Till Here -->
                                            <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Bond Details</p>
                                                    <h6 class="text-muted f-w-400">2 years</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Will provide Internship?</p>
                                                    <h6 class="text-muted f-w-400">Yes</h6>
                                                </div>
                                            </div>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Minimum Qualification</p>
                                                    <h6 class="text-muted f-w-400">No Backlog</h6>
                                                    <h6 class="text-muted f-w-400">6 CGPA</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Requirement/Skills</p>
                                                    <h6 class="text-muted f-w-400">React.JS</h6>
                                                    <h6 class="text-muted f-w-400">Node.JS</h6>
                                                    <h6 class="text-muted f-w-400">Express.JS</h6>
                                                </div>
                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">HR Information</h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Name</p>
                                                    <h6 class="text-muted f-w-400">HR_name</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Contact</p>
                                                    <h6 class="text-muted f-w-400">989898989</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">E-Mail</p>
                                                    <h6 class="text-muted f-w-400">hr@gmail.com</h6>
                                                </div>
                                            </div>
                                            <!-- <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">SSC Details </h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">Passing Year</p>
                                                    <h6 class="text-muted f-w-400">2019</h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">Percentile</p>
                                                    <h6 class="text-muted f-w-400">99%</h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">Percentage</p>
                                                    <h6 class="text-muted f-w-400">99%</h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">out of 600</p>
                                                    <h6 class="text-muted f-w-400">569</h6>
                                                </div>
                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">D2D Details </h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Passing Year</p>
                                                    <h6 class="text-muted f-w-400">2019</h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">CGPA</p>
                                                    <h6 class="text-muted f-w-400">9.63</h6>
                                                </div>

                                            </div>
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">HSC Details </h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">Passing Year</p>
                                                    <h6 class="text-muted f-w-400">2019</h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">Percentile</p>
                                                    <h6 class="text-muted f-w-400">99%</h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">Percentage</p>
                                                    <h6 class="text-muted f-w-400">99%</h6>
                                                </div>
                                                <div class="col-sm-3">
                                                    <p class="m-b-5 f-w-600">out of 600</p>
                                                    <h6 class="text-muted f-w-400">569</h6>
                                                </div>
                                            </div>
                                            <div class="row m-b-20">
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Physics</p>
                                                    <h6 class="text-muted f-w-400">98</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Chemistry</p>
                                                    <h6 class="text-muted f-w-400">99</h6>
                                                </div>
                                                <div class="col-sm-4">
                                                    <p class="m-b-5 f-w-600">Maths</p>
                                                    <h6 class="text-muted f-w-400">99</h6>
                                                </div>

                                            </div> -->
                                            <h6 class="m-b-20 m-t-40 p-b-5 b-b-default f-w-600">Documents </h6>

                                            <!-- this will go in the loop -->
                                            <div class="row m-b-20">
                                                <div class="col-sm-4">
                                                    <a href="#">
                                                        <p class="m-b-5 f-w-600">JD_1</p>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4">
                                                    <a href="#">
                                                        <p class="m-b-5 f-w-600">JD_2</p>
                                                    </a>
                                                </div>
                                                <div class="col-sm-4">
                                                    <a href="#">
                                                        <p class="m-b-5 f-w-600">JD_3</p>
                                                    </a>
                                                </div>
                                            </div>
                                            <!-- till here -->


                                            <!-- <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                            </ul> -->
                                        </div>
                                    </div>
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