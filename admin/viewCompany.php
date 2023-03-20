<?php

include("../database.php");
include("../helper/authorization.php");
if ($access != 1) {
    echo "<script>
    window.location.href = 'http://localhost/tpc-main/helper/noAccess.php';
</script>";
}

$addSuccess = 0;
$addFailure = 0;
$id = $_GET["id"];
if (isset($_POST["approval"])) {
    if ($_POST["approval"] == "Approve") {
        $query = "update company set active=1 where comp_id='$id';";
        $update = $conn->query($query);
    } else if ($_POST["approval"] == "Reject") {
        $query = "update company set active=2 where comp_id='$id';";
        $update = $conn->query($query);
    }
    // $update = $conn->query("update table `result` set `active`=1 where comp_id='$id');");
    if ($conn->affected_rows) {
        $addSuccess = 1;
    } else {
        // var_dump($conn->error_list);
        $addFailure = 1;
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
    <?php if ($addSuccess == 1 || $addFailure == 1) : ?>
        <meta http-equiv="refresh" content="2;url=http://localhost/tpc-main/admin/company.php" />
    <?php endif ?>
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
                            <?php if ($addSuccess == 1) : ?>
                                <p class="bg-success text-white text-center">Successfully Added </p>
                            <?php endif ?>
                            <?php if ($addFailure == 1) : ?>
                                <p class="bg-danger text-white text-center">Error in Adding the Result </p>
                            <?php endif ?>
                            <?php
                            $search = $conn->query("SELECT * FROM  `company` where comp_id='$id'");
                            while ($row = $search->fetch_assoc()) {
                            ?>
                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                            <div class="card-block text-center text-white">
                                                <div class="m-b-25">
                                                    <img src='http://localhost/tpc-main/admin/uploads/<?php echo $row["comp_logo"]; ?>' class="img-radius" alt="User-Profile-Image">
                                                </div>
                                                <p>
                                                    <span class="badge text-white badge-lg badge-dot">
                                                        <?php if ($row["active"] == 0) {
                                                            echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-warning'></i>Pending
                                </span>";
                                                        } else if ($row["active"] == 1) {
                                                            echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-success'></i>Approved
                                </span>";
                                                        } else if ($row["active"] == 2) {
                                                            echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-danger'></i>Rejected
                                </span>";
                                                        }
                                                        ?>
                                                    </span>
                                                <p><?php echo $row["comp_name"]; ?></p>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <form action="./viewCompany.php?id=<?php echo $id; ?>" method="post">
                                                            <input type="submit" value="Approve" name="approval" class="text-center btn btn-success m-5" />
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="submit" value="Reject" name="approval" class="text-center btn btn-danger m-5" />
                                                        </form>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Company Information</h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6 ">
                                                        <p class="m-b-5 f-w-600">Company Name</p>
                                                        <!-- <input type="text" class="form-control" name="" id="" value="hi"> -->
                                                        <h6 class="text-muted f-w-400"><?php echo
                                                                                        $row["comp_name"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">Location</p>
                                                        <h6 class="text-muted f-w-400"><?php echo
                                                                                        $row["location"]; ?></h6>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-12">
                                                        <p class="m-b-5 f-w-600">URL</p>
                                                        <a href="<?php echo $row["comp_url"]; ?>" class="text-reset">
                                                            <h6 class="text-muted f-w-400"><?php echo $row["comp_url"]; ?></h6>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-12">
                                                        <p class="m-b-5 f-w-600">Description</p>
                                                        <a href="<?php echo $row["comp_url"]; ?>" class="text-reset">
                                                            <h6 class="text-muted f-w-400"><?php echo $row["company_description"]; ?></h6>
                                                        </a>
                                                    </div>
                                                </div>

                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">HR Information</h6>
                                                <div class="row m-b-20">
                                                    <div class="col-sm-6 ">
                                                        <p class="m-b-5 f-w-600">HR Name</p>
                                                        <!-- <input type="text" class="form-control" name="" id="" value="hi"> -->
                                                        <h6 class="text-muted f-w-400"><?php echo
                                                                                        $row["comp_hr_name"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">HR Email</p>
                                                        <h6 class="text-muted f-w-400"><?php echo
                                                                                        $row["comp_hr_name"]; ?></h6>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <p class="m-b-5 f-w-600">HR Mobile</p>
                                                        <h6 class="text-muted f-w-400"><?php echo
                                                                                        $row["comp_hr_mobile"]; ?></h6>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php   }
                            ?>
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