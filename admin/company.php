<?php

include("../database.php");
include("../helper/authorization.php");
if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
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


    <title>Company</title>
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
                        <h1 class="h2 mb-0 ls-tight">Company</h1>
                    </div>
                    <!-- Actions -->
                    <div class="col-sm-6 col-12 text-sm-end">
                        <div class="mx-n1">
                            <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-pencil"></i>
                                </span>
                                <span>Edit</span>
                            </a> -->
                            <a href="addcompany.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-plus"></i>
                                </span>
                                <span>Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Nav -->
                <?php
                $show = isset($_GET["show"]) ? $_GET["show"] : "all";
                $query = "SELECT comp_id,comp_name,comp_hr_name,comp_hr_mobile,active,comp_logo FROM `company` ";
                if ($show == "all") {
                } elseif ($show == "pending") {
                    $query = $query . " WHERE active=1 ";
                } else {
                    $query = $query . " WHERE active=2 ";
                }
                $search = $conn->query($query);
                ?>
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item ">
                        <a href="./company.php?show=all" class="nav-link font-regular <?php if ($show == "all") echo "active" ?>">All Companies</a>
                    </li>
                    <li class="nav-item">
                        <a href="./company.php?show=pending" class="nav-link font-regular <?php if ($show == "pending") echo "active" ?>">In Process</a>
                    </li>
                    <li class="nav-item">
                        <a href="./company.php?show=completed" class="nav-link font-regular <?php if ($show == "completed") echo "active" ?>">Completed</a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="card shadow border-0 mb-7">
            <div class="card-header">
                <!-- <h5 class="mb-0">Students</h5> -->
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">HR Name</th>
                            <th scope="col">HR Mobile</th>
                            <th scope="col">Logo</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while ($row = $search->fetch_assoc()) {
                        ?>
                            <tr>
                                <td>
                                    <p class="text-heading font-semibold">
                                        <?php echo $row["comp_name"] ?>
                                    </p>
                                </td>
                                <td>
                                    <?php echo $row["comp_hr_name"] ?>
                                </td>
                                <td>
                                    <?php echo $row["comp_hr_mobile"] ?>
                                </td>
                                <td>
                                    <img alt="..." src="uploads/<?php echo $row["comp_name"] . "/" . $row["comp_logo"]; ?>" class="avatar avatar-xs rounded-circle me-2">
                                </td>
                                <td>
                                    <?php if ($row["active"] == 0) {
                                        echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-warning'></i>Pending
                                </span>";
                                    } else if ($row["active"] == 1) {
                                        echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-success'></i>Drive In Process 
                                </span>";
                                    } else if ($row["active"] == 2) {
                                        echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-danger'></i>Drive Completed
                                </span>";
                                    }

                                    ?>
                                </td>
                                <td class="text-end">
                                    <a href="./viewCompany.php?id=<?php echo $row["comp_id"]; ?>" class="btn btn-sm btn-neutral">View</a>
                                    <a href="./updateCompany.php?updateId=<?php echo $row["comp_id"]; ?>" class="btn btn-square btn-sm btn-neutral text-warning-hover"><i class="bi bi-pencil"></i></a>
                                    <a href="./updateCompany.php?deleteId=<?php echo $row["comp_id"]; ?>" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
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