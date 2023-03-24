<?php

include("../database.php");
include("../helper/authorization.php");
if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}

$updateSuccess = 0;
$updateFailure = 0;
$title = "";
$desc = "";
$id = "";
$dateAnnouce = "";
$isAll = FALSE;
$dept = array();

if (isset($_GET["deleteId"])) {
    $id = $_GET["deleteId"];
    $delete = $conn->query("DELETE FROM announcement WHERE announcement_id = '$id'");
    if ($conn->affected_rows) {
        echo "<script> window.location.href = 'http://localhost/tpc-main/admin/announcements.php'; </script>";
    }
}

if (isset($_GET["updateId"]) || isset($_POST["id"])) {
    $id = isset($_GET["updateId"]) ? $_GET["updateId"] : $_POST["id"];

    $search = $conn->query("SELECT * FROM  `announcement` WHERE announcement_id = '$id'");

    if ($search->num_rows == 1) {
        $row = $search->fetch_assoc();
        $title = $row["title"];
        $desc = $row["description"];
        $dateAnnouce = $row["posted_on"];
        $dept = json_decode($row["dept"], true);
        $isAll = sizeof($dept) == 8 ? TRUE : FALSE;
    }
    // var_dump($isAll);
}
if (isset($_POST["update-annouce"])) {
    $id = $_POST["id"];
    $title = $_POST["update-title"];
    $desc = $_POST["update-desc"];
    $deptEligible = array();
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

    $update = $conn->query("UPDATE announcement SET title='$title', description='$desc', dept='$deptEligible' WHERE announcement_id = '$id'");

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
    <?php if ($updateSuccess == 1 || $updateFailure == 1) : ?>
        <meta http-equiv="refresh" content="2;url=http://localhost/tpc-main/admin/announcements.php" />
    <?php endif ?>
    <link rel="stylesheet" href="./helper/sidebar.css">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>Update Announcement</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row  d-flex justify-content-center">
                        <?php if ($updateSuccess == 1) : ?>
                            <p class="bg-success text-white text-center">Successfully Updated </p>
                        <?php endif ?>
                        <?php if ($updateFailure == 1) : ?>
                            <p class="bg-danger text-white text-center">Error in Updating the Annoucement </p>
                        <?php endif ?>
                        <form action="./updateannounce.php" method="post">

                            <div class="card user-card-full">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col">
                                        <div class="card-block">
                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Update An Announcement</h6>
                                            <div class="col d-flex justify-content-start">
                                                <p class="m-b-5 f-w-600">Date</p>
                                                <p class="mx-10">:</p>

                                                <p class="mx-10"><?php echo $dateAnnouce ?></p>
                                            </div>
                                            <form action="./updateannounce.php" method="post">
                                                <input type="text" name="id" value="<?php echo $id ?>" hidden>
                                                <div class="col">
                                                    <p class="m-b-5 f-w-600 anno">Heading</p>
                                                    <input type="text" class="m-b-5 form-control" name="update-title" id="" value="<?php echo $title ?>">
                                                </div>
                                                <div class="col">
                                                    <p class="m-b-5 f-w-600 anno">Description</p>
                                                    <input type="text" class="m-b-5 form-control" name="update-desc" id="" value="<?php echo $desc ?>">
                                                </div>
                                                <div class="col">
                                                    <p class="m-b-5 f-w-600 anno">Department</p>
                                                    <div class="row">

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
                                                </div>

                                        </div>
                                    </div>
                                </div>

                                <input type="submit" value="Update" name="update-annouce" class="text-center btn btn-primary">
                            </div>
                        </form>
                        </form>

                    </div>
        </main>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./helper/sidebar.js"></script>

</body>

</html>