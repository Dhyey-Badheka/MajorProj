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
                                <span class="h3 font-bold mb-0"><?php
                                                                $query = "select count(*) as total from student";
                                                                $search = $conn->query($query);
                                                                $row = $search->fetch_assoc();
                                                                $total = $row["total"];
                                                                echo $total;
                                                                ?></span>
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
                                <span class="h3 font-bold mb-0"><?php
                                                                $query = "select count(*) as total from student where isinterestedforplacement=1";
                                                                $search = $conn->query($query);
                                                                $row = $search->fetch_assoc();
                                                                $interested = $row["total"];
                                                                echo $interested;
                                                                ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-person-hearts"></i>
                                </div>
                            </div>
                        </div>
                        <div class=" mb-0 text-sm">
                            <span class="badge badge-pill bg-primary bg-soft-warning text-danger">
                                <h5><i class='bx bxs-error text-m'></i>
                                    <?php
                                    echo $total - $interested;
                                    ?></h5>
                            </span>
                            <span class="text-nowrap text-m text-muted">Not Interested</span>
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
                                <span class="h3 font-bold mb-0"><?php $query = "select count(*) as total from student where is_placed=1";
                                                                $search = $conn->query($query);
                                                                $row = $search->fetch_assoc();
                                                                $placed = $row["total"];
                                                                echo $placed;
                                                                ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-person-rolodex"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-primary bg-soft-warning text-warning me-2">
                                <h5><i class='bx bxs-error'><?php
                                                            echo $interested - $placed;
                                                            ?></i></h5>
                            </span>
                            <span class="text-nowrap text-m text-muted">Remaining for Placement</span>
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
                                <span class="h3 font-bold mb-0"><?php $query = "select count(*) as total from company";
                                                                $search = $conn->query($query);
                                                                $row = $search->fetch_assoc();
                                                                $company = $row["total"];
                                                                echo $company;
                                                                ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class="bi bi-building-fill-check"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-primary bg-soft-success text-success me-2">
                                <h5><i class='bx bx-share bx-flip-horizontal'></i> <?php $query = "select count(*) as total from company where active=2";
                                                                                    $search = $conn->query($query);
                                                                                    $row = $search->fetch_assoc();
                                                                                    $company_visited = $row["total"];
                                                                                    echo $company_visited;
                                                                                    ?>
                                </h5>
                            </span>
                            <span class="text-nowrap text-m text-muted">On-Going</span>
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
                                <span class="h3 font-bold mb-0"><?php $query = "select count(*) as total from drive";
                                                                $search = $conn->query($query);
                                                                $row = $search->fetch_assoc();
                                                                $drives = $row["total"];
                                                                echo $drives;
                                                                ?></span>
                            </div>
                            <div class="col-auto">
                                <div class="icon icon-shape bg-primary text-white text-lg rounded-circle">
                                    <i class='bx bx-sitemap'></i>
                                </div>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm">
                            <span class="badge badge-pill bg-primary bg-soft-warning text-warning me-2">
                                <h5> <i class="bi bi-hourglass-split"></i> <?php $query = "select count(*) as total from drive where inProcess=1";
                                                                            $search = $conn->query($query);
                                                                            $row = $search->fetch_assoc();
                                                                            $drives_comp = $row["total"];
                                                                            echo $drives_comp;
                                                                            ?></h5>
                            </span>
                            <span class="text-nowrap text-m text-muted">On-Going</span>
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
                                <span class="h3 font-bold mb-0"><?php
                                                                $year = date("Y");
                                                                $query = "select count(*) as total from tpc where academic_year = '$year'";
                                                                $search = $conn->query($query);
                                                                $row = $search->fetch_assoc();
                                                                $tpc = $row["total"];
                                                                echo $tpc;
                                                                ?></span>
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
                                <span class="h3 font-bold mb-0"><?php
                                                                $year = date("Y");
                                                                $query = "select count(*) as total from tpf where academic_year = '$year'";
                                                                $search = $conn->query($query);
                                                                $row = $search->fetch_assoc();
                                                                $tpf = $row["total"];
                                                                echo $tpf;
                                                                ?></span>
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
                                <span class="h3 font-bold mb-0"><?php
                                                                $query = "SELECT student_placed,salary FROM result,drive where result.drive_id=drive.drive_id;";
                                                                $search = $conn->query($query);
                                                                $tot = 0;
                                                                $totStu = 0;
                                                                while ($row = $search->fetch_assoc()) {
                                                                    $array = $row["student_placed"];
                                                                    $arr_json = json_decode($array);
                                                                    $count = count($arr_json);
                                                                    $salary = $row["salary"];
                                                                    $tot += ($count * $salary);
                                                                    $totStu += $count;
                                                                }
                                                                echo
                                                                number_format((float)(($tot / 100000) / $totStu), 2, '.', '') . " LPA";
                                                                ?></span>
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
                                <div class="col" style="
    padding-right: 0;
">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Civil</span>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT student_placed,salary FROM result,drive where result.drive_id=drive.drive_id;";
                                                                    $search = $conn->query($query);
                                                                    $tot = 0;
                                                                    $totStu = 0;
                                                                    while ($row = $search->fetch_assoc()) {
                                                                        $array = $row["student_placed"];
                                                                        $arr_json = json_decode($array);
                                                                        $count = 0;
                                                                        foreach ($arr_json as $stu) {
                                                                            $query = "SELECT dept_id FROM student where id_number='$stu';";
                                                                            $search1 = $conn->query($query);
                                                                            $row1 = $search1->fetch_assoc();
                                                                            $dept_id = $row1["dept_id"];
                                                                            if ($dept_id == "1") {
                                                                                $count++;
                                                                            }
                                                                        }
                                                                        $totStu += $count;
                                                                        $salary = $row["salary"];
                                                                        $tot += ($count * $salary);
                                                                    }
                                                                    if ($totStu > 0) {
                                                                        echo ($tot / 100000) / $totStu . " LPA";
                                                                    } else {
                                                                        echo "Yet to begin Placement";
                                                                    }
                                                                    ?></span> <br>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT count(*) as total FROM student where dept_id='1' and isinterestedforplacement='1'";
                                                                    $search = $conn->query($query);
                                                                    $tot = 0;
                                                                    $totStu = 0;
                                                                    $row = $search->fetch_assoc();
                                                                    echo $totStu . "/" . $row["total"] ?> Placed</span>
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
                                <div class="col" style="
    padding-right: 0;
">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Computer</span>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT student_placed,salary FROM result,drive where result.drive_id=drive.drive_id;";
                                                                    $search = $conn->query($query);
                                                                    $tot = 0;
                                                                    $totStu = 0;
                                                                    while ($row = $search->fetch_assoc()) {
                                                                        $array = $row["student_placed"];
                                                                        $arr_json = json_decode($array);
                                                                        $count = 0;
                                                                        foreach ($arr_json as $stu) {
                                                                            $query = "SELECT dept_id FROM student where id_number='$stu';";
                                                                            $search1 = $conn->query($query);
                                                                            $row1 = $search1->fetch_assoc();
                                                                            $dept_id = $row1["dept_id"];
                                                                            if ($dept_id == "2") {
                                                                                $count++;
                                                                            }
                                                                        }
                                                                        $totStu += $count;
                                                                        $salary = $row["salary"];
                                                                        $tot += ($count * $salary);
                                                                    }
                                                                    if ($totStu > 0) {
                                                                        echo ($tot / 100000) / $totStu . " LPA";
                                                                    } else {
                                                                        echo "Yet to begin Placement";
                                                                    }
                                                                    ?></span> <br>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT count(*) as total FROM student where dept_id='2' and isinterestedforplacement='1'";
                                                                    $search = $conn->query($query);
                                                                    $row = $search->fetch_assoc();
                                                                    echo $totStu . "/" . $row["total"] ?> Placed</span>
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
                                <div class="col" style="
    padding-right: 0;
">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Electronics and Communications</span>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT student_placed,salary FROM result,drive where result.drive_id=drive.drive_id;";
                                                                    $search = $conn->query($query);
                                                                    $tot = 0;
                                                                    $totStu = 0;
                                                                    while ($row = $search->fetch_assoc()) {
                                                                        $array = $row["student_placed"];
                                                                        $arr_json = json_decode($array);
                                                                        $count = 0;
                                                                        foreach ($arr_json as $stu) {
                                                                            $query = "SELECT dept_id FROM student where id_number='$stu';";
                                                                            $search1 = $conn->query($query);
                                                                            $row1 = $search1->fetch_assoc();
                                                                            $dept_id = $row1["dept_id"];
                                                                            if ($dept_id == "3") {
                                                                                $count++;
                                                                            }
                                                                        }
                                                                        $totStu += $count;
                                                                        $salary = $row["salary"];
                                                                        $tot += ($count * $salary);
                                                                    }
                                                                    if ($totStu > 0) {
                                                                        echo ($tot / 100000) / $totStu . " LPA";
                                                                    } else {
                                                                        echo "Yet to begin Placement";
                                                                    }
                                                                    ?></span> <br>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT count(*) as total FROM student where dept_id='3' and isinterestedforplacement='1'";
                                                                    $search = $conn->query($query);
                                                                    $row = $search->fetch_assoc();
                                                                    echo $totStu . "/" . $row["total"] ?> Placed</span>
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
                                <div class="col" style="
    padding-right: 0;
">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Electrical </span>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT student_placed,salary FROM result,drive where result.drive_id=drive.drive_id;";
                                                                    $search = $conn->query($query);
                                                                    $tot = 0;
                                                                    $totStu = 0;
                                                                    while ($row = $search->fetch_assoc()) {
                                                                        $array = $row["student_placed"];
                                                                        $arr_json = json_decode($array);
                                                                        $count = 0;
                                                                        foreach ($arr_json as $stu) {
                                                                            $query = "SELECT dept_id FROM student where id_number='$stu';";
                                                                            $search1 = $conn->query($query);
                                                                            $row1 = $search1->fetch_assoc();
                                                                            $dept_id = $row1["dept_id"];
                                                                            if ($dept_id == "4") {
                                                                                $count++;
                                                                            }
                                                                        }
                                                                        $totStu += $count;
                                                                        $salary = $row["salary"];
                                                                        $tot += ($count * $salary);
                                                                    }
                                                                    if ($totStu > 0) {
                                                                        echo ($tot / 100000) / $totStu . " LPA";
                                                                    } else {
                                                                        echo "Yet to begin Placement";
                                                                    }
                                                                    ?></span> <br>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT count(*) as total FROM student where dept_id='4' and isinterestedforplacement='1'";
                                                                    $search = $conn->query($query);
                                                                    $row = $search->fetch_assoc();
                                                                    echo $totStu . "/" . $row["total"] ?> Placed</span>
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
                                <div class="col" style="
    padding-right: 0;
">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Electronics</span>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT student_placed,salary FROM result,drive where result.drive_id=drive.drive_id;";
                                                                    $search = $conn->query($query);
                                                                    $tot = 0;
                                                                    $totStu = 0;
                                                                    while ($row = $search->fetch_assoc()) {
                                                                        $array = $row["student_placed"];
                                                                        $arr_json = json_decode($array);
                                                                        $count = 0;
                                                                        foreach ($arr_json as $stu) {
                                                                            $query = "SELECT dept_id FROM student where id_number='$stu';";
                                                                            $search1 = $conn->query($query);
                                                                            $row1 = $search1->fetch_assoc();
                                                                            $dept_id = $row1["dept_id"];
                                                                            if ($dept_id == "5") {
                                                                                $count++;
                                                                            }
                                                                        }
                                                                        $tot += ($count * $salary);
                                                                    }
                                                                    if ($totStu > 0) {
                                                                        echo ($tot / 100000) / $totStu . " LPA";
                                                                    } else {
                                                                        echo "Yet to begin Placement";
                                                                    }
                                                                    ?></span> <br>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT count(*) as total FROM student where dept_id='5' and isinterestedforplacement='1'";
                                                                    $search = $conn->query($query);
                                                                    $tot = 0;
                                                                    $totStu = 0;
                                                                    $row = $search->fetch_assoc();
                                                                    echo $totStu . "/" . $row["total"] ?> Placed</span>
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
                                <div class="col" style="
    padding-right: 0;
">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Information Technology</span>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT student_placed,salary FROM result,drive where result.drive_id=drive.drive_id;";
                                                                    $search = $conn->query($query);
                                                                    $tot = 0;
                                                                    $totStu = 0;
                                                                    while ($row = $search->fetch_assoc()) {
                                                                        $array = $row["student_placed"];
                                                                        $arr_json = json_decode($array);
                                                                        $count = 0;
                                                                        foreach ($arr_json as $stu) {
                                                                            $query = "SELECT dept_id FROM student where id_number='$stu';";
                                                                            $search1 = $conn->query($query);
                                                                            $row1 = $search1->fetch_assoc();
                                                                            $dept_id = $row1["dept_id"];
                                                                            if ($dept_id == "6") {
                                                                                $count++;
                                                                            }
                                                                        }
                                                                        $totStu += $count;
                                                                        $salary = $row["salary"];
                                                                        $tot += ($count * $salary);
                                                                    }
                                                                    if ($totStu > 0) {
                                                                        echo ($tot / 100000) / $totStu . " LPA";
                                                                    } else {
                                                                        echo "Yet to begin Placement";
                                                                    }
                                                                    ?></span> <br>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT count(*) as total FROM student where dept_id='6' and isinterestedforplacement='1'";
                                                                    $search = $conn->query($query);
                                                                    $row = $search->fetch_assoc();
                                                                    echo $totStu . "/" . $row["total"] ?> Placed</span>
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
                                <div class="col" style="
    padding-right: 0;
">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Mechanical</span>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT student_placed,salary FROM result,drive where result.drive_id=drive.drive_id;";
                                                                    $search = $conn->query($query);
                                                                    $tot = 0;
                                                                    $totStu = 0;
                                                                    while ($row = $search->fetch_assoc()) {
                                                                        $array = $row["student_placed"];
                                                                        $arr_json = json_decode($array);
                                                                        $count = 0;
                                                                        foreach ($arr_json as $stu) {
                                                                            $query = "SELECT dept_id FROM student where id_number='$stu';";
                                                                            $search1 = $conn->query($query);
                                                                            $row1 = $search1->fetch_assoc();
                                                                            $dept_id = $row1["dept_id"];
                                                                            if ($dept_id == "7") {
                                                                                $count++;
                                                                            }
                                                                        }
                                                                        $totStu += $count;
                                                                        $salary = $row["salary"];
                                                                        $tot += ($count * $salary);
                                                                    }
                                                                    if ($totStu > 0) {
                                                                        if ($totStu > 0) {
                                                                            echo ($tot / 100000) / $totStu . " LPA";
                                                                        } else {
                                                                            echo "Yet to begin Placement";
                                                                        }
                                                                    } else {
                                                                        echo "Yet to begin Placement";
                                                                    }
                                                                    ?></span> <br>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT count(*) as total FROM student where dept_id='7' and isinterestedforplacement='1'";
                                                                    $search = $conn->query($query);
                                                                    $row = $search->fetch_assoc();
                                                                    echo $totStu . "/" . $row["total"] ?> Placed</span>
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
                                <div class="col" style="
    padding-right: 0;
">
                                    <span class="h6 font-semibold text-muted text-sm d-block mb-2">Production</span>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT student_placed,salary FROM result,drive where result.drive_id=drive.drive_id;";
                                                                    $search = $conn->query($query);
                                                                    $tot = 0;
                                                                    $totStu = 0;
                                                                    while ($row = $search->fetch_assoc()) {
                                                                        $array = $row["student_placed"];
                                                                        $arr_json = json_decode($array);
                                                                        $count = 0;
                                                                        foreach ($arr_json as $stu) {
                                                                            $query = "SELECT dept_id FROM student where id_number='$stu';";
                                                                            $search1 = $conn->query($query);
                                                                            $row1 = $search1->fetch_assoc();
                                                                            $dept_id = $row1["dept_id"];
                                                                            if ($dept_id == "8") {
                                                                                $count++;
                                                                            }
                                                                        }
                                                                        $tot += ($count * $salary);
                                                                    }
                                                                    if ($totStu > 0) {
                                                                        echo ($tot / 100000) / $totStu . " LPA";
                                                                    } else {
                                                                        echo "Yet to begin Placement";
                                                                    }
                                                                    ?></span> <br>
                                    <span class="h3 font-bold mb-0"><?php
                                                                    $query = "SELECT count(*) as total FROM student where dept_id='8' and isinterestedforplacement='1'";
                                                                    $search = $conn->query($query);
                                                                    $tot = 0;
                                                                    $totStu = 0;
                                                                    $row = $search->fetch_assoc();
                                                                    echo $totStu . "/" . $row["total"] ?> Placed</span>
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