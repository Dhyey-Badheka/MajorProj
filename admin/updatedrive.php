<?php
include("../database.php");
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

if (isset($_GET["deleteid"])) {
    $id = $_GET["deleteid"];
    $delete = $conn->query("DELETE FROM drive WHERE drive_id = '$id'");
    if ($conn->affected_rows) {
        echo "<script>
    window.location.href = 'http://localhost/tpc-main/admin/drives.php';
</script>";
    }
}

if (isset($_GET["updateid"]) || isset($_POST["id"])) {
    $id = isset($_GET["updateid"]) ? $_GET["updateid"] : $_POST["id"];
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
        $dbc = $row["dead_backlog"];
        $doc = $row["pdfdoc"];
        $inProcess = $row["inProcess"];
        $no_of_role = $row["no_of_job_role"];
        $dept = json_decode($row["dept_eligible"], true);
        $isAll = sizeof($dept) == 8 ? TRUE : FALSE;
    }
    // var_dump($isAll);
}
if (isset($_POST["update-drive"])) {
    $id = $_POST["id"];
    $inProcess = $_POST["inProcess"];
    $job_role = $_POST["job_role"];
    $deadline = $_POST["deadline"];
    $salary = $_POST["salary"];
    $location = $_POST["location"];
    $desc = $_POST["description"];
    $skills = $_POST["skillsreq"];
    $bond = $_POST["bond"];
    $stipend = $_POST["stipend"];
    $will_provide_intern = $_POST["willprovideinternship"];
    $intern_duration = $_POST["internship_duration"];
    $sscc = $_POST["ssccriteria"];
    $hscc = $_POST["hsccriteria"];
    $cpic = $_POST["cpicriteria"];
    $spic = $_POST["spicriteria"];
    $abc = $_POST["active_backlog"];
    $dbc = $_POST["dead_backlog"];
    $no_of_role = $_POST["no_of_job_role"];
    $deptEligible = array();
    $targetDir = "uploads/";
    $fileName = basename($_FILES["pdfdoc"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
    move_uploaded_file($_FILES["pdfdoc"]["tmp_name"], $targetFilePath);
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
    $query = "UPDATE drive SET `deadline`= '$deadline', `salary`= '$salary', `location`= '$location', `description`= '$desc', `skillsreq`= '$skills', `bond`='$bond', `stipend`='$stipend', `willprovideinternship`='$will_provide_intern', `internship_duration`='$intern_duration', `ssccriteria`='$sscc', `hsccriteria`='$hscc', `cpicriteria`='$cpic', `spicriteria`='$spic', `active_backlog`='$abc', `dead_backlog`='$dbc', `dept_eligible`='$deptEligible', `pdfdoc`='$fileName', `no_of_job_role`='$no_of_role', `job_role`='$job_role' WHERE drive_id = '$id'";
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
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>Update Drive</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row d-flex justify-content-center">
                        <?php if ($updateSuccess == 1) : ?>
                            <p class="bg-success text-white text-center">Successfully Updated </p>
                        <?php endif ?>
                        <?php if ($updateFailure == 1) : ?>
                            <p class="bg-danger text-white text-center">Error in Updating the Drive </p>
                        <?php endif ?>
                        <form action="./updatedrive.php" method="post" enctype="multipart/form-data">
                            <div class="card user-card-full">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col">
                                        <div class="card-block">
                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Update Drive</h6>
                                            <form action="./updatedrive.php" method="post" enctype="multipart/form-data">
                                                <input type="text" name="id" value="<?php echo $id ?>" hidden>
                                                <input type="text" name="inProcess" value="<?php echo $inProcess ?>" hidden>
                                                <div class="card user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                                            <div class="card-block text-center text-white">
                                                                <div class="m-b-25">
                                                                    <img id="showLogo" src='http://localhost/tpc-main/admin/uploads/<?php echo $comp_logo ?>' class="img-radius" alt="User-Profile-Image" />
                                                                </div>
                                                                <p>
                                                                    <span class="badge text-white badge-lg badge-dot">
                                                                        <?php if ($inProcess == 0) {
                                                                            echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-warning'></i>In Process
                                </span>";
                                                                        } else if ($inProcess == 1) {
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
                                                                        <input type="text" class="m-b-5 form-control" name="job_role" id="" value="<?php echo $job_role; ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Deadline</p>
                                                                        <input type="date" class="m-b-5 form-control" name="deadline" id="" value="<?php echo $deadline; ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Salary</p>
                                                                        <input type="number" class="m-b-5 form-control" name="salary" id="" value="<?php echo $salary; ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Location</p>
                                                                        <input type="text" class="m-b-5 form-control" name="location" id="" value="<?php echo $location; ?>">
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <p class="m-b-5 f-w-600">Description</p>
                                                                        <textarea class="m-b-5 form-control" rows="5" name="description" id=""><?php echo $desc; ?></textarea>
                                                                    </div>
                                                                    <div class="col-sm-12">
                                                                        <p class="m-b-5 f-w-600">Skills Required</p>
                                                                        <textarea class="m-b-5 form-control" name="skillsreq" rows="4" id=""><?php echo $skills; ?></textarea>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Bond Period</p>
                                                                        <input type="number" class="m-b-5 form-control" name="bond" id="" value="<?php echo $bond; ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Will Provide Internship?</p>
                                                                        <p> <input type="radio" id="intern" name="willprovideinternship" value="0" <?php if ($will_provide_intern == 0) echo "checked" ?>> NO</input> </p>
                                                                        <p> <input type="radio" id="intern" name="willprovideinternship" value="1" <?php if ($will_provide_intern == 1) echo "checked" ?>> YES</input> </p>
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Stipend(During Internship)</p>
                                                                        <input type="number" class="m-b-5 form-control" name="stipend" id="" value="<?php echo $stipend ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Internship Duration(Months)</p>
                                                                        <input type="number" class="m-b-5 form-control" name="internship_duration" id="" value="<?php echo $intern_duration ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Minimum 10th % Criteria</p><input type="number" class="m-b-5 form-control" name="ssccriteria" id="" value="<?php echo $sscc ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Minimum 12th % Criteria</p><input type="number" class="m-b-5 form-control" name="hsccriteria" id="" value="<?php echo $hscc ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Minimum CPI Criteria</p><input type="number" class="m-b-5 form-control" name="cpicriteria" id="" value="<?php echo $cpic ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Minimum SPI Criteria(in all Sems)</p><input type="number" class="m-b-5 form-control" name="spicriteria" id="" value="<?php echo $spic ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Active Backlogs</p><input type="number" class="m-b-5 form-control" name="active_backlog" id="" value="<?php echo $abc ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Dead Backlogs</p><input type="number" class="m-b-5 form-control" name="dead_backlog" id="" value="<?php echo $dbc ?>">
                                                                    </div>
                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">No. of Openings</p><input type="number" class="m-b-5 form-control" name="no_of_job_role" id="" value="<?php echo $no_of_role ?>">
                                                                    </div>
                                                                    <div class="row">
                                                                        <p class="m-b-5 f-w-600">Eligible Branches</p>
                                                                        <div class="form-check col-sm-3">
                                                                            <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="0" <?php if ($isAll) echo "checked"; ?>><label class="form-check-label"> All Department</label>
                                                                        </div>
                                                                        <div class="form-check col-sm-3">
                                                                            <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="1" <?php if (in_array(1, $dept) && !$isAll) echo "checked" ?>><label class="form-check-label">Civil</label>
                                                                        </div>
                                                                        <div class="form-check col-sm-3">
                                                                            <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="2" <?php if (in_array(2, $dept) && !$isAll) echo "checked" ?>><label class="form-check-label"> Computer</label>
                                                                        </div>
                                                                        <div class="form-check col-sm-3">
                                                                            <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="3" <?php if (in_array(3, $dept) && !$isAll) echo "checked" ?>><label class="form-check-label"> Electronics and Communications</label>
                                                                        </div>
                                                                        <div class="form-check col-sm-3">
                                                                            <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="4" <?php if (in_array(4, $dept) && !$isAll) echo "checked" ?>><label class="form-check-label"> Electrical</label>
                                                                        </div>
                                                                        <div class="form-check col-sm-3">
                                                                            <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="5" <?php if (in_array(5, $dept) && !$isAll) echo "checked" ?>><label class="form-check-label"> Electronics</label>
                                                                        </div>
                                                                        <div class="form-check col-sm-3">
                                                                            <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="6" <?php if (in_array(6, $dept) && !$isAll) echo "checked" ?>><label class="form-check-label">Information Technology</label>
                                                                        </div>
                                                                        <div class="form-check col-sm-3">
                                                                            <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="7" <?php if (in_array(7, $dept) && !$isAll) echo "checked" ?>><label class="form-check-label">Mechanical</label>
                                                                        </div>
                                                                        <div class="form-check col-sm-3">
                                                                            <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="8" <?php if (in_array(8, $dept) && !$isAll) echo "checked" ?>><label class="form-check-label">Production</label>
                                                                        </div>
                                                                    </div>

                                                                    <div class=" col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Attach PDF('s)</p>

                                                                        <input type="file" id="actual-btn" name="pdfdoc" multiple value="<?php echo $doc ?>" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input type="submit" value="Update" name="update-drive" class="text-center btn btn-primary">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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