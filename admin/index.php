<?php

include("../database.php");
include("../helper/authorization.php");

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
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title>Document</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <h1>Dashboard</h1>

        <div class="row g-6 mb-6">
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Students</span>
                                <span class="h3 font-bold mb-0">650</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-people"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Interested Students</span>
                                <span class="h3 font-bold mb-0">432</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-person-hearts"></i>
                                </div>
                            </div>
                        </div>
                        <div class=" mb-0 text-sm">
                            <span class="badge badge-pill bg-primary bg-soft-warning text-danger">
                                <i class='bx bxs-error'></i> 218
                            </span>
                            <span class="text-nowrap text-xs text-muted">Not Interested</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Students Placed</span>
                                <span class="h3 font-bold mb-0">352</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-person-rolodex"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-primary bg-soft-warning text-warning me-2">
                                <i class='bx bxs-error'></i> 120
                            </span>
                            <span class="text-nowrap text-xs text-muted">Remaining for Placement</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Companies Visited</span>
                                <span class="h3 font-bold mb-0">14</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-building-fill-check"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-primary bg-soft-success text-success me-2">
                                <i class='bx bx-share bx-flip-horizontal'></i> 5
                            </span>
                            <span class="text-nowrap text-xs text-muted">On-Going</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Drives Completed</span>
                                <span class="h3 font-bold mb-0">19</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class='bx bx-sitemap'></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-primary bg-soft-warning text-warning me-2">
                                <i class="bi bi-hourglass-split"></i> 3</span>
                            <span class="text-nowrap text-xs text-muted">On-Going</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Student Coordinators</span>
                                <span class="h3 font-bold mb-0">19</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle"><i class="bi bi-award-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Total Faculty Coordinators</span>
                                <span class="h3 font-bold mb-0">10</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle"><i class="bi bi-award-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-sm-6 col-12">
                <div class="card shadow border-0">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <span class="h6 font-semibold text-muted text-sm d-block mb-2">Average Package</span>
                                <span class="h3 font-bold mb-0">5.6 LPA</span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-currency-rupee"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h1>Departmental Statistics</h1>

            <!-- Average Package of different departments -->

            <?php
            if ($access == 2) {
                $show = $_SESSION["adminDept"];
            }
            if ($access == 1 || $access == 3 || ($access == 2 && $show == '1')) { ?>
                <!-- Average Package of Civil Department -->

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Civil Department</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            <?php } ?>
            <?php
            if ($access == 1 || $access == 3 || ($access == 2 && $show == '2')) : ?>

                <!-- Average Package of Computer Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Computer Department</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php
            if ($access == 1 || $access == 3 || ($access == 2 && $show == '3')) : ?>

                <!-- Average Package of EC Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Electronics and Communications Department</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php
            if ($access == 1 || $access == 3 || ($access == 2 && $show == '4')) : ?>

                <!-- Average Package of EE Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Electrical Department</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php
            if ($access == 1 || $access == 3 || ($access == 2 && $show == '5')) : ?>

                <!-- Average Package of EL Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Electronics Department</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php
            if ($access == 1 || $access == 3 || ($access == 2 && $show == '6')) : ?>

                <!-- Average Package of IT Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Information Technology Department</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php
            if ($access == 1 || $access == 3 || ($access == 2 && $show == '7')) : ?>

                <!-- Average Package of ME Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Mechanical Department</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>
            <?php
            if ($access == 1 || $access == 3 || ($access == 2 && $show == '8')) : ?>

                <!-- Average Package of EE Department -->
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card shadow border-0">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Production Department</span>
                                    <span class="h3 font-bold mb-0">5.5 LPA</span> <br>
                                    <span class="h3 font-bold mb-0">55/60 Placed</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-info text-white text-lg rounded-circle">
                                        <i class='bx bx-sitemap'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif ?>


        </div>







        <p class="copyright">
            &copy; 2023 - <span>Dhyey Badheka</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>