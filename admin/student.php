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
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <title>Document</title>
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
                        <h1 class="h2 mb-0 ls-tight">Student</h1>
                    </div>
                    <!-- Actions -->
                    <div class="col-sm-6 col-12 text-sm-end">
                        <div class="mx-n1">

                            <a href="#" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-plus"></i>
                                </span>
                                <span>Download</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Nav -->
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item ">
                        <a href="#" class="nav-link active">All Students</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Pending</a>
                    </li>
                    <?php
                    if ($access == 1) {
                        $search = $conn->query("SELECT dept_name FROM  `department`");
                    } elseif ($access == 2 || $access == 3) {
                        $search = $conn->query("SELECT dept_name FROM  `department` WHERE dept_id='$dept'");
                    }
                    while ($row = $search->fetch_assoc()) { ?>
                        <li class="nav-item">
                            <a href="#" class="nav-link font-regular"><?php echo $row["dept_name"] ?></a>
                        </li>
                    <?php } ?>
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
                            <th scope="col">Id Number</th>
                            <th scope="col">Email</th>
                            <th scope="col">Department</th>
                            <th scope="col">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($access == 1) {
                            $query = "SELECT * FROM  `student`;";
                            $result = mysqli_query($conn, $query);
                        } elseif ($access == 2 || $access == 3) {
                            $query = "SELECT * FROM  `student` WHERE dept_id='$dept';";
                            $result = mysqli_query($conn, $query);
                        }
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td>
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $row["first_name"] . " " . $row["last_name"]; ?>
                                    </a>
                                </td>
                                <td>
                                    <?php echo $row["id_number"] ?>
                                </td>
                                <td>
                                    <a class="text-heading font-semibold" href="#">
                                        <?php echo $row["pemail"] ?>
                                    </a>
                                </td>
                                <td>
                                    <?php
                                    $dept_id = $row["dept_id"];
                                    $search = $conn->query("SELECT dept_name FROM  `department` WHERE dept_id='$dept_id'");
                                    $row1 = $search->fetch_assoc();
                                    echo $row1["dept_name"] ?>
                                </td>
                                <td>
                                    <?php if ($row["is_approved"] == 0) {
                                        echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-warning'></i>Pending
                                </span>";
                                    } else if ($row["is_approved"] == 1) {
                                        echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-success'></i>Approved
                                </span>";
                                    } else if ($row["is_approved"] == 2) {
                                        echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-danger'></i>Rejected
                                </span>";
                                    }
                                    ?>
                                </td>
                                <td class="text-end">
                                    <a href="./viewStudent.php?id=<?php echo $row["id_number"] ?>" class="btn btn-sm btn-neutral">View</a>
                                    <a href="./updateStudent.php?id=<?php echo $row["id_number"] ?>" class="btn btn-square btn-sm btn-neutral text-warning-hover"><i class="bi bi-pencil"></i></a>
                                    <a href="./delStudent.php?id=<?php echo $row["id_number"] ?>" class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="card-footer border-0 py-5">
                <span class="text-muted text-sm">Showing 10 items out of 250 results found</span>
            </div>
        </div>





        <p class="copyright">
            &copy; 2023 - <span>Dhyey Badheka</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>