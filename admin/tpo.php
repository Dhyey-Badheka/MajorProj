<?php
include("../database.php");
include("../helper/authorization.php");

if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}


$show = isset($_GET["show"]) ? $_GET["show"] : "active";

// var_dump($show);

if ($show == "all") {
    $displaytpo = $conn->query("SELECT * FROM `tpo`");
} elseif ($show == "inactive") {
    $displaytpo = $conn->query("SELECT * FROM `tpo` WHERE isActive=0");
} else {
    $displaytpo = $conn->query("SELECT * FROM `tpo` WHERE isActive=1");
}

// if action button is clicked
$action = isset($_GET["action"]) ? $_GET["action"] : 0;

// var_dump($action);
if ($action == "active") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];
        // change the status from 0 to 1
        $update = $conn->query("UPDATE `tpo` SET `isActive`=1 WHERE tpo_id = '$id'");

        if ($conn->affected_rows) {
            echo "<script> window.location.href = 'http://localhost/tpc-main/admin/tpo.php'; </script>";
        }
    }
} elseif ($action == "inactive") {
    if (isset($_GET["id"])) {
        $id = $_GET["id"];

        // change the status from 1 to 0
        $update = $conn->query("UPDATE `tpo` SET `isActive`=0 WHERE tpo_id = '$id'");
        if ($conn->affected_rows) {
            echo "<script> window.location.href = 'http://localhost/tpc-main/admin/tpo.php'; </script>";
        }
    }
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <title>Admin | tpo</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <main>

        <!-- <h1>Student</h1> -->
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <!-- Title -->
                        <h1 class="h2 mb-0 ls-tight">Welcome, TPO</h1>
                    </div>
                    <!-- Actions -->
                    <div class="col-sm-6 col-12 text-sm-end">
                        <div class="mx-n1">
                            <a href="./addtpo.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-plus"></i>
                                </span>
                                <span>Add tpo</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Nav -->
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item">
                        <a href="./tpo.php?show=active" class="nav-link font-regular <?php if ($show == "active") echo "active" ?>">Active</a>
                    </li>
                    <li class="nav-item ">
                        <a href="./tpo.php?show=all" class="nav-link font-regular <?php if ($show == "all") echo "active" ?>">All Officers</a>
                    </li>
                    <li class="nav-item">
                        <a href="./tpo.php?show=inactive" class="nav-link font-regular <?php if ($show == "inactive") echo "active" ?>">In-Active</a>
                    </li>

                </ul>
            </div>
        </div>

        <div class="card shadow border-0 mb-7">
            <div class="card-header">
                <h5 class="mb-0">Training & Placement Officers</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Status</th>
                            <th class="text-end" scope="col">Action</th>
                            <!-- <th></th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $displaytpo->fetch_assoc()) {
                        ?>
                            <tr>
                                <td>
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $row["tpo_name"]  ?>
                                    </a>
                                </td>
                                <td>
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $row["tpo_email"] ?>
                                    </a>
                                </td>
                                <td>
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $row["tpo_number"] ?>
                                    </a>
                                </td>
                                <td>
                                    <?php if ($row['isActive']) : ?>
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-success"></i>Active
                                        </span>
                                    <?php else : ?>
                                        <span class="badge badge-lg badge-dot">
                                            <i class="bg-danger"></i>In-Active
                                        </span>
                                    <?php endif ?>
                                </td>
                                <td class="text-end">

                                    <!-- Check the condition if active then show inactive button and vice versa -->
                                    <?php if ($row['isActive']) : ?>
                                        <a href="./tpo.php?id=<?php echo $row["tpo_id"] ?>&action=inactive" class="btn btn-danger-hover btn-sm btn-square btn-neutral text-danger-hover">
                                            <i class="bi bi-bookmark-x "></i>
                                        </a>
                                    <?php else : ?>

                                        <a href="./tpo.php?id=<?php echo $row["tpo_id"] ?>&action=active" class="btn btn-success-hover btn-square btn-sm btn-neutral text-warning-hover"><i class="bi bi-bookmark-check"></i></a>

                                    <?php endif ?>
                                </td>
                            </tr>
                        <?php
                        } ?>

                    </tbody>
                </table>
            </div>
        </div>

        <p class="copyright">
            &copy; 2023 - <span>Dhyey Badheka</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>