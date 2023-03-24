<?php

include("../database.php");
include("../helper/authorization.php");
if ($access == 2 || $access == 3) {
    $dept = $_SESSION["adminDept"];
}
if ($access == 1 || $access == 2) {
} else {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Admin | TPC</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <h1 class="h2 mb-0 ls-tight">
                            <h1>Welcome <?php echo $_SESSION["admin"] ?>,</h1>
                    </div>
                    <div class="col-sm-6 col-12 text-sm-end">
                        <div class="mx-n1">
                            <a href="./addTpc.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-plus"></i>
                                </span>
                                <span>Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Active</a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link font-regular">All Students Co-ordinators</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-regular">In-Active</a>
                    </li>
                    <?php if ($access == 1) {
                        $search = $conn->query("SELECT dept_name FROM  `department`");
                    } elseif ($access == 2) {
                        $search = $conn->query("SELECT dept_name FROM  `department` WHERE dept_id='$dept'");
                    }
                    while ($row = $search->fetch_assoc()) {
                    ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link font-regular"><?php echo $row["dept_name"] ?></a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <div class="card shadow border-0 mb-7">
            <div class="table-responsive">
                <table class="table table-hover table-nowrap">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Department</th>
                            <th scope="col">Id Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Mobile</th>
                            <th scope="col">Status</th>
                            <th class="text-end" scope="col">Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php if ($access == 1) {
                            $search = $conn->query("SELECT * FROM  `tpc`");
                        } elseif ($access == 2) {
                            $search = $conn->query("SELECT * FROM  `tpc` WHERE tpc_dept_id='$dept'");
                        }
                        while ($row = $search->fetch_assoc()) { ?>
                            <tr>
                                <td>
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $row["tpc_name"] ?>
                                    </a>
                                </td>
                                <td>
                                    <?php
                                    $dept = $row["tpc_dept_id"];
                                    $search1 = $conn->query("SELECT dept_name FROM  `department` WHERE dept_id='$dept'");
                                    while ($row1 = $search1->fetch_assoc()) {
                                        echo $row1["dept_name"];
                                    } ?>

                                </td>
                                <td>
                                    <?php echo $row["tpc_id"] ?>
                                </td>
                                <td>
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $row["tpc_email"] ?>
                                    </a>
                                </td>
                                <td>
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $row["tpc_mobile"] ?>
                                    </a>
                                </td>
                                <td>
                                    <span class="badge text-white badge-lg badge-dot">
                                        <?php if ($row["isActive"] == 1) {
                                            echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-success'></i>Active
                                </span>";
                                        } else if ($row["isActive"] == 0) {
                                            echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-danger'></i>Unavailable
                                </span>";
                                        }
                                        ?>
                                    </span>
                                </td>
                                <td class="text-end">
                                    <a href="./updatetpc.php?activeid=<?php echo $row["tpc_id"] ?>
" class="btn btn-success-hover btn-square btn-sm btn-neutral text-success-hover"><i class="bi bi-bookmark-check"></i></a>
                                    <a href="./updatetpc.php?inactiveid=<?php echo $row["tpc_id"] ?>
" class="btn btn-danger-hover btn-sm btn-square btn-neutral text-danger-hover">
                                        <i class="bi bi-bookmark-x "></i>
                                    </a>
                                    <a href="./updatetpc.php?deleteid=<?php echo $row["tpc_id"] ?>" class="btn btn-sm btn-square btn-neutral text-danger-hover">
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
</body>
<script src="./helper/sidebar.js"></script>

</html>