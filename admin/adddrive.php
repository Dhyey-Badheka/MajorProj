<?php

include("../database.php");
include("../helper/authorization.php");

if ($access == 2 || $access == 3) {
    $dept = $_SESSION["adminDept"];
}

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
    <title>Add Drive</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>
            <form action="./adddrive.php" method="POST" enctype="multipart/form-data">
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
                                                        <input type="text" class="m-b-5 form-control" name="" id="" placeholder="Comapany's Name">
                                                    </div>
                                                    <!-- <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Job Role</p>
                                                        <input type="text" class="m-b-5 form-control" name="" id="" value="j_name">
                                                    </div> -->
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Company URL</p>
                                                        <input type="text" class="m-b-5 form-control" name="" id="" placeholder="Comapany's Website URL">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">HR Name</p>
                                                        <input type="text" class="m-b-5 form-control" name="" id="" placeholder="Comapany's HR Name">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">HR Phone</p>
                                                        <input type="number" class="m-b-5 form-control" name="" id="" placeholder="Comapany's HR Number">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">HR Email</p>
                                                        <input type="email" class="m-b-5 form-control" name="" id="" placeholder="Comapany's HR EMail">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Deadline</p>
                                                        <input type="date" class="m-b-5 form-control" name="" id="">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Location</p>
                                                        <input type="text" class="m-b-5 form-control" name="" id="" placeholder="Comapany's Location">
                                                    </div>
                                                    <div class="col-sm-20">
                                                        <p class="m-b-5 f-w-600">Company Description</p>
                                                        <textarea class="m-b-5 form-control" name="companyDesc" id="">Company Description</textarea>
                                                    </div>
                                                    <div class="col-sm-20">
                                                        <p class="m-b-5 f-w-600">Skills Required</p>
                                                        <textarea class="m-b-5 form-control" name="" id="">Skills Required </textarea>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Bond(in years)</p>
                                                        <input type="number" class="m-b-5 form-control" name="" id="" placeholder="0">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Will Provide Internship?</p>
                                                        <p> <input type="radio" id="intern" name="intern" value="0" checked> NO</input> </p>
                                                        <p> <input type="radio" id="intern" name="intern" value="1"> YES</input> </p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Stipend(During Internsip)</p>
                                                        <input type="number" class="m-b-5 form-control" name="" id="" placeholder="15000">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Minimum 10th % Criteria</p><input type="number" class="m-b-5 form-control" name="" id="" value="60">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Minimum 12th % Criteria</p><input type="number" class="m-b-5 form-control" name="" id="" placeholder="80">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Minimum CPI Criteria</p><input type="number" class="m-b-5 form-control" name="" id="" placeholder="6">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Minimum SPI Criteria(in all Sems)</p><input type="number" class="m-b-5 form-control" name="" id="" placeholder="6">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Eligible Branches</p>
                                                        <div class="col">
                                                            <p class="m-b-5 f-w-600 anno">Department</p>

                                                            <div class="form-check col-m-6">
                                                                <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="0"><label class="form-check-label"> All Department</label>
                                                            </div>
                                                            <div class="form-check col-sm-3">
                                                                <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="1"><label class="form-check-label">Civil</label>
                                                            </div>
                                                            <div class="form-check col-sm-3">
                                                                <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="2"><label class="form-check-label"> Computer</label>
                                                            </div>
                                                            <div class="form-check col-sm-3">
                                                                <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="3"><label class="form-check-label"> Electronics and Communications</label>
                                                            </div>
                                                            <div class="form-check col-sm-3">
                                                                <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="4"><label class="form-check-label"> Electrical</label>
                                                            </div>
                                                            <div class="form-check col-sm-3">
                                                                <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="5"><label class="form-check-label"> Electronics</label>
                                                            </div>
                                                            <div class="form-check col-sm-3">
                                                                <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="6"><label class="form-check-label">Information Technology</label>
                                                            </div>
                                                            <div class="form-check col-sm-3">
                                                                <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="7"><label class="form-check-label">Mechanical</label>
                                                            </div>
                                                            <div class="form-check col-sm-3">
                                                                <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="8"><label class="form-check-label">Production</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row m-b-20">
                                                        <div class="col-sm-6">
                                                            <p class="m-b-5 f-w-600">No. Of Job Roles </p>
                                                            <input type="number" class="m-b-5 form-control" onkeyup="addJobRole()" name="jobRoleNumber" id="jRn">
                                                        </div>
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
                                        <button class="text-center btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </main>

    </div>



    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
    <script src="./helper/sidebar.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script>
        function imagePreview(fileInput) {
            if (fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showLogo').attr('src', e.target.result);
                }
                reader.readAsDataURL(fileInput.files[0]);
            }
        }

        $("#file").change(function() {
            imagePreview(this);
        });




        const actualBtn = document.getElementById('actual-btn');

        const fileChosen = document.getElementById('file-chosen');

        actualBtn.addEventListener('change', function() {
            fileChosen.textContent = this.files[0].name
        })

        function addJobRole() {
            var n = document.getElementById("jRn").value;
            var d = document.getElementById("noOfJR")
            for (let index = 1; index <= n; index++) {
                d.innerHTML += "<div class='col-sm-12'><p class ='m-b-5 my-5 f-w-600 h4' >" + index + ". Job Role </p></div>";
                d.innerHTML += "<div class='col-sm-6'><p class='m-b-5 f-w-600'>Job Role</p><input type='text' name='jr" + index + "' class='m-b-5 form-control'></div>";
                d.innerHTML += "<div class='col-sm-6'><p class='m-b-5 f-w-600'>Salary (LPA)</p><input type='text' name='salary" + index + "'class='m-b-5 form-control'></div>";

            }
        }
    </script>

</body>

</html>