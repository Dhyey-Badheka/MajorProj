<?php
include("../database.php");
include("../helper/authorization.php");
if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}
$updateSuccess = 0;
$updateFailure = 0;
$c_name = "";
$job_role = "";
$deadline = "";
$salary = "";
$location = "";
$desc = "";
$bond = "";
$stipend = "";
$comp_logo = "";
$will_provide_intern = "";
$intern_duration = "";
$sscc = "";
$hscc = "";
$cpic = "";
$spic = "";
$abc = "";
$dbc = "";
$inProcess = "";
$doc = "";
$comp_id = "";
$no_of_role = "";
$isAll = FALSE;
$dept = array();


if (isset($_POST["add-drive"])) {
    // $id = $_POST["id"];
    $inProcess = 1;
    $job_role = $_POST["job_role"];
    $comp_id = $_POST["comp_id"];
    $deadline = $_POST["deadline"];
    $salary = $_POST["salary"];
    $location = $_POST["location"];
    $desc = $_POST["description"];
    $skills = $_POST["skillsreq"];
    $bond = $_POST["bond"];
    $stipend = $_POST["stipend"];
    $will_provide_intern = $_POST["willprovideinternship"];
    $intern_duration = $_POST["internship_duration"];
    $sscc = $_POST["sscc"];
    $hscc = $_POST["hscc"];
    $cpic = $_POST["cpic"];
    $spic = $_POST["spic"];
    $abc = $_POST["abc"];
    $dbc = $_POST["dbc"];
    $no_of_role = $_POST["no_of_job_role"];
    $deptEligible = array();
    $query = "select comp_name from company where comp_id='$comp_id';";
    // echo $query;
    $update = $conn->query($query);
    $row = $update->fetch_assoc();
    $targetDir = "uploads/" . $row["comp_name"] . "/";
    if (!file_exists($targetDir)) {
        mkdir(
            $targetDir,
            0777,
            true
        );
    }
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    foreach ($_POST["eligible_dept"] as $selected) {
        if ($selected == 0) {
            for ($i = 1; $i <= 8; $i++) {
                array_push($deptEligible, intval($i));
            }
            break;
        } else {
            array_push($deptEligible, intval($selected));
        }
    }
    $deptEligible = json_encode($deptEligible);
    $query = "INSERT INTO drive (`comp_id`, `deadline`, `salary`, `location`, `description`, `skillsreq`, `bond`, `stipend`, `willprovideinternship`, `internship_duration`, `ssccriteria`, `hsccriteria`, `cpicriteria`, `spicriteria`, `active_backlog`, `total_backlog`, `dept_eligible`, `pdfdoc`, `no_of_job_role`, `job_role`, `applied_stu`, `inProcess`) VALUES
        ('$comp_id', '$deadline', '$salary','$location', '$desc', '$skills', '$bond', '$stipend', '$will_provide_intern','$intern_duration','$sscc','$hscc','$cpic', '$spic', '$abc', '$dbc','$deptEligible','$fileName','$no_of_role','$job_role','[]','1');";
    // echo $query;
    $update = $conn->query($query);
    // echo $query;
    if ($conn->affected_rows) {
        $updateSuccess = 1;
    } else {
        // var_dump($conn->error_list);
        $updateFailure = 1;
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <?php if ($updateSuccess == 1 || $updateFailure == 1) : ?>
        <meta http-equiv="refresh" content="2;url=http://localhost/tpc-main/admin/drives.php" />
    <?php endif ?>
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
                                                    <!-- <button class="text-center btn my-2 btn-success">Upload Logo</button> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Drive Information</h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Company Name</p>
                                                        <select name="comp_id" id="job_id" class="form-control">
                                                            <option value="0">Select Company</option>
                                                            <?php
                                                            $search = $conn->query("SELECT comp_id,comp_name FROM  `company`; ");
                                                            while ($rows = $search->fetch_assoc()) {
                                                                echo "<option value='" . $rows['comp_id'] . "'>" . $rows['comp_name'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Job Role</p>
                                                        <input type="text" class="m-b-5 form-control" name="job_role" id="" placeholder="Job Role">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Salary</p>
                                                        <input type="number" class="m-b-5 form-control" name="salary" id="" placeholder="500000">
                                                    </div>
                                                    <div class=" col-sm-6">
                                                        <p class="m-b-5 f-w-600">Deadline</p>
                                                        <input type="datetime-local" class="m-b-5 form-control" name="deadline" id="">
                                                    </div>
                                                    <div class=" col-sm-6">
                                                        <p class="m-b-5 f-w-600">Job Location</p>
                                                        <input type="text" class="m-b-5 form-control" name="location" id="" placeholder="Comapany's Location">
                                                    </div>
                                                    <div class="col-sm-20">
                                                        <p class="m-b-5 f-w-600">Job Description</p>
                                                        <textarea class="m-b-5 form-control" name="description" id="">Job Description</textarea>
                                                    </div>
                                                    <div class="col-sm-20">
                                                        <p class="m-b-5 f-w-600">Skills Required</p>
                                                        <textarea class="m-b-5 form-control" name="skillsreq" id="">Skills Required </textarea>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Bond(in years)</p>
                                                        <input type="number" class="m-b-5 form-control" name="bond" id="" placeholder="0">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Will Provide Internship?</p>
                                                        <p> <input type="radio" id="intern" name="willprovideinternship" value="0"> NO</input> </p>
                                                        <p> <input type="radio" id="intern" name="willprovideinternship" value="1" checked> YES</input> </p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Stipend(During Internship)</p>
                                                        <input type="number" class="m-b-5 form-control" name="stipend" id="" placeholder="15000">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Internsip Duration(Months)</p>
                                                        <input type="number" class="m-b-5 form-control" name="internship_duration" id="" placeholder="6">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Minimum 10th % Criteria</p><input type="number" class="m-b-5 form-control" name="sscc" id="" placeholder="60">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Minimum 12th % Criteria</p><input type="number" class="m-b-5 form-control" name="hscc" id="" placeholder="60">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Minimum CPI Criteria</p><input type="number" class="m-b-5 form-control" name="cpic" id="" placeholder="6">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Minimum SPI Criteria(in all Sems)</p><input type="number" class="m-b-5 form-control" name="spic" id="" placeholder="6">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Active Backlog Criteria</p><input type="number" class="m-b-5 form-control" name="abc" id="" placeholder="0">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Dead Backlog Criteria</p><input type="number" class="m-b-5 form-control" name="dbc" id="" placeholder="0">
                                                    </div>

                                                    <div class="row m-b-20">
                                                        <div class="col-sm-6">
                                                            <p class="m-b-5 f-w-600">No. Of Job Roles </p>
                                                            <input type="number" class="m-b-5 form-control" onkeyup="addJobRole()" name="no_of_job_role" id="jRn" placeholder="5">
                                                        </div>
                                                        <div class=" col-sm-6">
                                                            <p class="m-b-5 f-w-600">Eligible Branches</p>
                                                            <div class="col">
                                                                <p class="m-b-5 f-w-600 anno">Department</p>

                                                                <div class="form-check col-m-6">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="0" checked><label class="form-check-label"> All Department</label>
                                                                </div>
                                                                <div class="form-check col-sm-3">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="1"><label class="form-check-label"> Civil</label>
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
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="6"><label class="form-check-label"> Information Technology</label>
                                                                </div>
                                                                <div class="form-check col-sm-3">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="7"><label class="form-check-label"> Mechanical</label>
                                                                </div>
                                                                <div class="form-check col-sm-3">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="8"><label class="form-check-label"> Production</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class=" col-sm-6">
                                                            <p class="m-b-5 f-w-600">Attach PDF('s)</p>

                                                            <input type="file" id="actual-btn" name="file" hidden />

                                                            <label for="actual-btn" class="label">Upload PDF</label>

                                                            <span id="file-chosen">No file chosen</span>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                        <input type="submit" value="Add" name="add-drive" class="text-center btn btn-primary">
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