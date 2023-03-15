<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <title>Drives</title>
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
                            <!-- <a href="#" class="btn d-inline-flex btn-sm btn-neutral border-base mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-pencil"></i>
                                </span>
                                <span>Edit</span>
                            </a> -->
                            <a href="./adddrive.php" class="btn d-inline-flex btn-sm btn-primary mx-1">
                                <span class=" pe-2">
                                    <i class="bi bi-plus"></i>
                                </span>
                                <span>Create</span>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- Nav -->
                <ul class="nav nav-tabs mt-4 overflow-x border-0">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Active</a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link font-regular">All Drives</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Completed</a>
                    </li>
                    <!-- <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Civil</a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link font-regular">Mechanical</a>
                    </li> -->
                </ul>
            </div>
        </div>

        <div class="row">

            <!-- Total Students -->
            <div class="col-xl-12 col-sm-12 col-12">
                <div class="card shadow border-0 my-10 card-width-full">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col">
                                <span class="h2 font-bold  d-block mb-2">Tata Consultancy Services</span>
                                <span class="h5 font-semibold mb-0">www.tcs.com</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape text-white text-lg rounded-circle">
                                    <img src="../images/logo.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="mt-2 mb-0 text-sm">
                            <!-- <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>13%
                                <i class='bx bxs-error'></i>13
                            </span> -->
                            <span>

                                <a href="#" class="btn btn-primary btn-sm">View</a>
                                <a href="#" class="btn btn-warning btn-sm">Collect Data</a>
                                <a href="./updateStudent.php?id=<?php echo "id" ?>" class="btn btn-square btn-sm btn-neutral text-warning-hover"><i class="bi bi-pencil"></i></a>
                                <a href="./updateStudent.php?id=<?php echo "id" ?>" class="btn btn-square btn-sm btn-neutral btn-danger-hover"><i class="bi bi-trash"></i></a>

                            </span>

                            <!-- Status -->
                            <span class="badge mx-5 badge-lg badge-dot">
                                <i class="bg-success"></i>Active
                            </span>
                            <span class="badge mx-5 badge-lg badge-dot">
                                <i class="bg-warning"></i>Result
                            </span>
                            <!-- <span class="text-nowrap text-xs text-muted">Status</span> -->
                        </div>
                    </div>
                </div>
                <div class="card shadow border-0 my-10 card-width-full">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col">
                                <span class="h2 font-bold  d-block mb-2">Tata Consultancy Services</span>
                                <span class="h5 font-semibold mb-0">www.tcs.com</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape text-white text-lg rounded-circle">
                                    <img src="../images/logo.png" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="mt-2 mb-0 text-sm">
                            <!-- <span class="badge badge-pill bg-soft-warning text-warning me-2">
                                <i class="bi bi-arrow-up me-1"></i>13%
                                <i class='bx bxs-error'></i>13
                            </span> -->
                            <span>

                                <a href="./viewDrive.php?id=<?php echo "id" ?>" class="btn btn-primary btn-sm">View</a>
                                <a href="./collectData.php?id=<?php echo "id" ?>" class="btn btn-warning btn-sm">Collect Data</a>
                                <a href="./updateStudent.php?id=<?php echo "id" ?>" class="btn btn-square btn-sm btn-neutral text-warning-hover"><i class="bi bi-pencil"></i></a>
                                <a href="./updateStudent.php?id=<?php echo "id" ?>" class="btn btn-square btn-sm btn-neutral btn-danger-hover"><i class="bi bi-trash"></i></a>

                            </span>

                            <!-- Status -->
                            <span class="badge mx-5 badge-lg badge-dot">
                                <i class="bg-danger"></i>In-Active
                            </span>
                            <span class="badge mx-5 badge-lg badge-dot">
                                <i class="bg-success"></i>Result
                            </span>
                            <!-- <span class="text-nowrap text-xs text-muted">Status</span> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <p class="copyright">
            &copy; 2023 - <span>Jimish Ravat</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>