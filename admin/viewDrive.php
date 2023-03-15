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
    <title>View Drive</title>
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
                                                <!-- <div class="preview"></div> -->
                                                <img src="#" id="showLogo" class="img-radius my-5" alt="Company-Logo">
                                                <input type="file" name="file" id="file" class="inputfile" />
                                                <label for="file">Upload Logo</label>
                                                <!-- <button class="text-center btn my-2 btn-success">Upload Logo</button> -->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="card-block">
                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Company Information</h6>
                                            <div class="row m-b-20">
                                                <div class="col-sm-6 ">
                                                    <p class="m-b-5 f-w-600">Company Name</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="c_name">
                                                </div>
                                                <!-- <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Job Role</p>
                                                        <input type="text" class="m-b-5 form-control" name="" id="" value="j_name">
                                                    </div> -->
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Company URL</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="l_name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">HR Name</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="h_name">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">HR Phone</p>
                                                    <input type="number" class="m-b-5 form-control" name="" id="" value="7984528154">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">HR Email</p>
                                                    <input type="email" class="m-b-5 form-control" name="" id="" value="badheka15@gmail.com">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Deadline</p>
                                                    <input type="date" class="m-b-5 form-control" name="" id="" value="2001-03-02">
                                                </div>
                                                <!-- <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Salary</p>
                                                        <input type="number" class="m-b-5 form-control" name="" id="" value="700000">
                                                    </div> -->
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Location</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="Gandhinagar">
                                                </div>
                                                <div class="col-sm-20">
                                                    <p class="m-b-5 f-w-600">Job Description</p>
                                                    <textarea class="m-b-5 form-control" name="companyDesc" id="">Company Description</textarea>
                                                </div>
                                                <div class="col-sm-20">
                                                    <p class="m-b-5 f-w-600">Skills Required</p>
                                                    <textarea class="m-b-5 form-control" name="" id="">Skills Required </textarea>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Bond(in years)</p>
                                                    <input type="number" class="m-b-5 form-control" name="" id="" value="1.5">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Will Provide Internship?</p>
                                                    <p> <input type="radio" id="intern" name="intern" value="0" checked> NO</input> </p>
                                                    <p> <input type="radio" id="intern" name="intern" value="1"> YES</input> </p>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Stipend(During Internsip)</p>
                                                    <input type="number" class="m-b-5 form-control" name="" id="" value="15000">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Minimum 10th % Criteria</p><input type="number" class="m-b-5 form-control" name="" id="" value="60">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Minimum 12th % Criteria</p><input type="number" class="m-b-5 form-control" name="" id="" value="60">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Minimum CPI Criteria</p><input type="number" class="m-b-5 form-control" name="" id="" value="6">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Minimum SPI Criteria(in all Sems)</p><input type="number" class="m-b-5 form-control" name="" id="" value="6">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Eligible Branches</p>
                                                    <input type="checkbox" id="IT" name="dept" value="10">
                                                    <label for="IT"> IT</label><br>
                                                    <input type="checkbox" id="CP" name="dept" value="3">
                                                    <label for="CP"> CP</label><br>
                                                    <input type="checkbox" id="ME" name="dept" value="6">
                                                    <label for="ME">ME</label><br>
                                                    <input type="checkbox" id="CE" name="dept" value="1">
                                                    <label for="CE"> CE</label><br>
                                                    <input type="checkbox" id="EC" name="dept" value="9">
                                                    <label for="EC"> EC</label><br>
                                                    <input type="checkbox" id="EE" name="dept" value="4">
                                                    <label for="EE"> EE</label><br>
                                                    <input type="checkbox" id="EL" name="dept" value="5">
                                                    <label for="EL"> EL</label><br>
                                                    <input type="checkbox" id="PE" name="dept" value="8">
                                                    <label for="PE"> PE</label><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">No. Of Job Roles </p>
                                                    <input type="number" class="m-b-5 form-control" onkeyup="addJobRole()" name="jobRoleNumber" id="jRn">
                                                </div>
                                                <div class="row my-5" id="noOfJR">
                                                    <!-- <div class="col-sm-12">

                                                            <p class="m-b-5 f-w-600 h4">1. Job Role</p>
                                                        </div>

                                                        <div class="col-sm-6">
                                                            <p class="m-b-5 f-w-600">Job Role</p>
                                                            <input type="text" name="jr" id="" class="m-b-5 form-control">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="m-b-5 f-w-600">Salary (LPA)</p>
                                                            <input type="text" name="salary" id="" class="m-b-5 form-control">
                                                        </div> -->

                                                    <div class=" col-sm-6">
                                                        <p class="m-b-5 f-w-600">Attach PDF('s)</p>

                                                        <input type="file" id="actual-btn" name="PDF" multiple hidden />

                                                        <label for="actual-btn" class="label">Upload PDF</label>

                                                        <span id="file-chosen">No file chosen</span>


                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- <button class="text-center btn btn-primary">Add</button> -->
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