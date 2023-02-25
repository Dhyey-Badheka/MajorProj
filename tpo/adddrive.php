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
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/approve.css">
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
                                                <img src="http://localhost/tpc-main/images/Dhyey.png" class="img-radius" alt="User-Profile-Image"> <button class="text-center btn my-2 btn-success">Upload Logo</button>
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
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Job Role</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="j_name">
                                                </div>
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
                                                    <input type="date" class="m-b-5 form-control" name="" id="" value="23-10-2001">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Salary</p>
                                                    <input type="number" class="m-b-5 form-control" name="" id="" value="700000">
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Location</p>
                                                    <input type="text" class="m-b-5 form-control" name="" id="" value="Gandhinagar">
                                                </div>
                                                <div class="col-sm-20">
                                                    <p class="m-b-5 f-w-600">Job Description</p> <textarea class="m-b-5 form-control" name="" id="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui dicta minus molestiae vel beatae natus eveniet ratione temporibus aperiam harum alias officiis assumenda officia quibusdam deleniti eos cupiditate dolore doloribus! Ad dolore dignissimos asperiores dicta facere optio quod commodi nam tempore recusandae. Rerum sed nulla eum vero expedita ex delectus voluptates rem at neque quos facere sequi unde optio aliquam Tenetur quod quidem in voluptatem corporis dolorum dicta sit pariatur porro quaerat autem ipsam odit quam beatae tempora quibusdam illum! Modi velit odio nam nulla unde amet odit pariatur at! Consequatur rerum amet fuga expedita sunt et tempora saepe? Iusto nihil explicabo perferendis quos provident delectus ducimus necessitatibus reiciendis optio tempora unde earum doloremque commodi laudantium ad nulla vel odio?</textarea>
                                                </div>
                                                <div class="col-sm-20">
                                                    <p class="m-b-5 f-w-600">Skills Required</p> <textarea class="m-b-5 form-control" name="" id="">1.Java And/Or Python(Programing Language)
2.HTML,CSS,JS</textarea>
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
                                                    <input type="checkbox" id="IT" name="IT" value="IT">
                                                    <label for="IT"> IT</label><br>
                                                    <input type="checkbox" id="CP" name="CP" value="CP">
                                                    <label for="CP"> CP</label><br>
                                                    <input type="checkbox" id="ME" name="ME" value="ME">
                                                    <label for="ME">ME</label><br>
                                                    <input type="checkbox" id="CE" name="CE" value="CE">
                                                    <label for="CE"> CE</label><br>
                                                    <input type="checkbox" id="EC" name="EC" value="EC">
                                                    <label for="EC"> EC</label><br>
                                                    <input type="checkbox" id="EE" name="EE" value="EE">
                                                    <label for="EE"> EE</label><br>
                                                    <input type="checkbox" id="EL" name="EL" value="EL">
                                                    <label for="EL"> EL</label><br>
                                                    <input type="checkbox" id="PE" name="PE" value="PE">
                                                    <label for="PE"> PE</label><br>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 f-w-600">Attach PDF(if any)</p>
                                                    <button class="text-center btn btn-success">Upload</button> <a href="http://localhost/tpc-main/demopdf/1.pdf"></a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <button class="text-center btn btn-primary">Add</button>
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