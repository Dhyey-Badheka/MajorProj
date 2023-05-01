<?php

$reqFor = "regis";
include("../database.php");
include("./helper/authorization.php");
include("./applyDrive.php");
$query = "SELECT * FROM student WHERE pemail = '$adminUserEmail' AND oauth_uid='$adminUserAuth' and is_registered='1' and is_approved='1'";
$check_result = $conn->query($query);
$row = $check_result->fetch_assoc();
$name = $row["first_name"] . " " . $row["last_name"];
$dept = $row["dept_id"];
$id_number = $row["id_number"];





if (isset($_GET["id"]) || isset($_POST["id"])) {
    $id = isset($_GET["id"]) ? $_GET["id"] : $_POST["id"];
    $search = $conn->query("SELECT * FROM `drive` WHERE drive_id = '$id'");
    if ($search->num_rows == 1) {
        $row = $search->fetch_assoc();
        $comp_id = $row["comp_id"];
        $search1 = $conn->query("SELECT * FROM `company` WHERE comp_id = '$comp_id'");
        $row1 = $search1->fetch_assoc();
        $c_name = $row1["comp_name"];
        $comp_logo = $row1["comp_logo"];
        $job_role = $row["job_role"];
        $deadline = $row["deadline"];
        $salary = $row["salary"];
        $location = $row["location"];
        $desc = $row["description"];
        $skills = $row["skillsreq"];
        $bond = $row["bond"];
        $stipend = $row["stipend"];
        $will_provide_intern = $row["willprovideinternship"];
        $intern_duration = $row["internship_duration"];
        $sscc = $row["ssccriteria"];
        $hscc = $row["hsccriteria"];
        $cpic = $row["cpicriteria"];
        $spic = $row["spicriteria"];
        $abc = $row["active_backlog"];
        $dbc = $row["total_backlog"];
        $doc = $row["pdfdoc"];
        $inProcess = $row["inProcess"];
        $no_of_role = $row["no_of_job_role"];
        $dept = json_decode($row["dept_eligible"], true);
        $isAll = sizeof($dept) == 8 ? TRUE : FALSE;
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
                    <div class="row d-flex justify-content-center">

                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">View Drive</h6>

                                        <input type="text" name="id" value="<?php echo $id ?>" hidden>
                                        <input type="text" name="id" value="<?php echo $id_number ?>" hidden>
                                        <input type="text" name="inProcess" value="<?php echo $inProcess ?>" hidden>
                                        <div class="card user-card-full">
                                            <div class="row m-l-0 m-r-0">
                                                <div class="col-sm-4 bg-c-lite-green user-profile">
                                                    <div class="card-block text-center text-white">
                                                        <div class="m-b-25">
                                                            <img id="showLogo" src='http://localhost/tpc-main/admin/uploads/<?php echo $c_name . "/" . $comp_logo ?>' class="img-radius" alt="User-Profile-Image" />
                                                        </div>
                                                        <p>
                                                            <span class="badge text-white badge-lg badge-dot">
                                                                <?php if ($inProcess == 1) {
                                                                    echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-warning'></i>In Process
                                </span>";
                                                                } else if ($inProcess == 0) {
                                                                    echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-success'></i>Results Out
                                </span>";
                                                                }
                                                                ?>
                                                            </span>
                                                        <h2><?php echo $c_name ?> </h2>
                                                        <h3><?php echo $job_role ?> </h3>
                                                    </div>
                                                </div>
                                                <div class="col-sm-8">
                                                    <div class="card-block">
                                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Company Information</h6>
                                                        <div class="row m-b-20">
                                                            <div class="col-sm-6 ">
                                                                <p class="m-b-5 f-w-600">Company Name</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $c_name; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Drive Name</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $job_role; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Deadline</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $deadline; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Salary</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $salary; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Location</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $location; ?></h6>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <p class="m-b-5 f-w-600">Description</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $desc; ?></h6>
                                                            </div>
                                                            <div class="col-sm-12">
                                                                <p class="m-b-5 f-w-600">Skills Required</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $skills; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Bond Period</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $bond; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Will Provide Internship?</p>
                                                                <p> <input type="radio" id="intern" name="willprovideinternship" value="0" <?php if ($will_provide_intern == 0) echo "checked" ?> disabled> NO</input> </p>
                                                                <p> <input type="radio" id="intern" name="willprovideinternship" value="1" <?php if ($will_provide_intern == 1) echo "checked" ?> disabled> YES</input> </p>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Stipend(During Internship)</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $stipend; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Internship Duration(Months)</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $intern_duration; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Minimum 10th % Criteria</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $sscc; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Minimum 12th % Criteria</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $hscc; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Minimum CPI Criteria</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $cpic; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Minimum SPI Criteria(in all Sems)</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $spic; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Active Backlogs</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $abc; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">Dead Backlogs</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $dbc; ?></h6>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <p class="m-b-5 f-w-600">No. of Openings</p>
                                                                <h6 name="comp_name" class="text-muted f-w-400"><?php echo $no_of_role; ?></h6>
                                                            </div>
                                                            <div class="row">
                                                                <p class="m-b-5 f-w-600">Eligible Branches</p>
                                                                <div class="form-check col-sm-3">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="0" <?php if ($isAll) echo "checked"; ?> disabled><label class="form-check-label"> All Department</label>
                                                                </div>
                                                                <div class="form-check col-sm-3">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="1" <?php if (in_array(1, $dept) && !$isAll) echo "checked" ?> disabled><label class="form-check-label">Civil</label>
                                                                </div>
                                                                <div class="form-check col-sm-3">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="2" <?php if (in_array(2, $dept) && !$isAll) echo "checked" ?> disabled><label class="form-check-label"> Computer</label>
                                                                </div>
                                                                <div class="form-check col-sm-3">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="3" <?php if (in_array(3, $dept) && !$isAll) echo "checked" ?> disabled><label class="form-check-label"> Electronics and Communications</label>
                                                                </div>
                                                                <div class="form-check col-sm-3">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="4" <?php if (in_array(4, $dept) && !$isAll) echo "checked" ?> disabled><label class="form-check-label"> Electrical</label>
                                                                </div>
                                                                <div class="form-check col-sm-3">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="5" <?php if (in_array(5, $dept) && !$isAll) echo "checked" ?> disabled><label class="form-check-label"> Electronics</label>
                                                                </div>
                                                                <div class="form-check col-sm-3">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="6" <?php if (in_array(6, $dept) && !$isAll) echo "checked" ?> disabled><label class="form-check-label">Information Technology</label>
                                                                </div>
                                                                <div class="form-check col-sm-3">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="7" <?php if (in_array(7, $dept) && !$isAll) echo "checked" ?> disabled><label class="form-check-label">Mechanical</label>
                                                                </div>
                                                                <div class="form-check col-sm-3">
                                                                    <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="8" <?php if (in_array(8, $dept) && !$isAll) echo "checked" ?> disabled><label class="form-check-label">Production</label>
                                                                </div>
                                                            </div>

                                                            <div class=" col-sm-6">
                                                                <p class="m-b-5 f-w-600">Attached PDF('s)</p>
                                                                <a href="http://localhost/tpc-main/admin/uploads/<?php echo $doc; ?>"><button class="text-center btn btn-success" target="_blank" rel="noopener noreferrer">View</button></a>
                                                            </div>
                                                            <span id="eligible">
                                                                <?php if (checkEligiblity($id, $id_number) == 1) : ?>
                                                                    <p style="color:green">You are eligible for this drive</p>
                                                                    <?php if (checkApplied($id, $id_number) == 1) : ?>
                                                                        <p style="color:blue">You have already applied for this drive</p>
                                                                    <?php else : ?>
                                                                        <a href="./applyDrive.php?drive_id=<?php echo $id ?>&stu_id=<?php echo $id_number ?>&resumeType=1" class=" btn text-white btn-warning btn-sm">Apply with Primary Resume</a>
                                                                        <a href="./applyDrive.php?drive_id=<?php echo $id ?>&stu_id=<?php echo $id_number ?>&resumeType=2" class=" btn text-white btn-warning btn-sm">Apply with Secondary Resume</a>
                                                                    <?php endif ?>
                                                                <?php else : ?>
                                                                    <p style="color:red">You are not eligible for this drive</p>
                                                                <?php endif ?>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="./helper/sidebar.js"></script>

</body>

</html>