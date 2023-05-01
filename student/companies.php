<?php

$reqFor = "regis";
include("../database.php");
include("./helper/authorization.php");
$query = "SELECT * FROM student WHERE pemail = '$adminUserEmail' AND oauth_uid='$adminUserAuth' and is_registered='1' and is_approved='1'";
$check_result = $conn->query($query);
$row = $check_result->fetch_assoc();
$name = $row["first_name"] . " " . $row["last_name"];
$dept = $row["dept_id"];
$show = isset($_GET["show"]) ? $_GET["show"] : "active";
// Session


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/company.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Drives</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h1 style="
    width: max-content;
">Welcome <?php echo $name ?>,</h1>
                    </div>
                    <!-- Actions -->
                    <div class="col-sm-6 col-12 text-sm-end">
                        <div class="mx-n1">
                        </div>
                    </div>
                </div>

                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item">
                        <a href="./companies.php?show=active" class="nav-link font-regular <?php if ($show == "active") echo "active" ?>">Active</a>
                    </li>
                    <li class="nav-item ">
                        <a href="./companies.php?show=all" class="nav-link font-regular <?php if ($show == "all") echo "active" ?>">All Drives</a>
                    </li>
                    <li class="nav-item">
                        <a href="./companies.php?show=completed" class="nav-link font-regular <?php if ($show == "completed") echo "active" ?>">Completed</a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
        $query = "SELECT * FROM  `drive` WHERE JSON_CONTAINS(dept_eligible,'$dept') ";
        if ($show == "all") {
        } elseif ($show == "active") {
            $query = $query . " and inProcess=1 ";
        } else {
            $query = $query . " and inProcess=0 ";
        }
        $search = $conn->query($query);
        while ($row = $search->fetch_assoc()) {
        ?>
            <div class="row">
                <!-- Total Students -->
                <div class="col-xl-12 col-sm-12 col-12">
                    <div class="card shadow border-0 my-2 card-width-full">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col">
                                    <span class="h2 font-bold d-block mb-2"><?php
                                                                            $comp_id = $row["comp_id"];
                                                                            $search1 = $conn->query("SELECT comp_name FROM  `company` WHERE comp_id='$comp_id'");
                                                                            $row1 = $search1->fetch_assoc();
                                                                            echo $row1["comp_name"] ?></p></span>
                                    <span class="h5 font-semibold mb-0"><?php echo $row["job_role"] ?></span>
                                </div>
                                <div class="col-auto">
                                    <div class="text-white text-lg rounded-circle">
                                        <?php
                                        $comp_id = $row["comp_id"];
                                        $search2 = $conn->query("SELECT comp_name,comp_logo FROM  `company` WHERE comp_id='$comp_id'");
                                        $row2 = $search2->fetch_assoc();
                                        $comp_logo = $row2["comp_logo"];
                                        echo '<img src="http://localhost/tpc-main/admin/uploads/' . $row2["comp_name"] . "/" . $comp_logo . '" alt="logo" height="80" width="80"/>' ?>
                                    </div>
                                </div>
                                <div class="mt-2 mb-0 text-m">
                                    <span>

                                        <a href="viewDrive.php?id=<?php echo $row["drive_id"]; ?>" class="btn btn-primary btn-sm">View</a>
                                    </span>

                                    <!-- Status -->
                                    <?php if ($row["inProcess"] == 0) {
                                        echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-success'></i>Results out
                                </span>";
                                    } else if ($row["inProcess"] == 1) {
                                        echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-warning'></i>In Process
                                </span>";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>


        <p class="copyright">
            &copy; 2023 - <span>Dhyey Badheka</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>