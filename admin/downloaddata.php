<?php

include("../database.php");
include("../helper/authorization.php");

if ($access == 2 || $access == 3) {
    $dept = $_SESSION["adminDept"];
}
if ($access >= 1 && $access <= 3) {
} else {
    echo "<script>
    window.location.href = 'http://localhost/tpc-main/helper/noAccess.php';
</script>";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <title>Download Data</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <main>

        <!-- <h1>Student</h1> -->
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <h1>Welcome <?php echo $_SESSION["admin"] ?>,</h1>
                    </div>
                    <div class="col-sm-6 col-12 text-sm-end">
                        <div class="mx-n1">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-3 col-md-5 mt-3">
                <div class="card h-50">
                    <div class="main-card-body">
                        <div class="row ">
                            <div class="col d-flex align-items-center">
                                <span class="h3 font-bold d-block">All Students</span>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm d-flex justify-content-start">
                            <form action="down.php" method="post">
                                <input type="text" name="all" value="all" hidden />
                                <input type="submit" name="submit" value="Download" class="btn btn-primary btn-sm " />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 mt-3">
                <div class="card h-50">
                    <div class="main-card-body">
                        <div class="row ">
                            <div class="col d-flex align-items-center">
                                <span class="h3 font-bold d-block">All Interested</span>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm d-flex justify-content-start">
                            <form action="down.php" method="post">
                                <input type="text" name="all" value="all" hidden />
                                <input type="text" name="interested" value="1" hidden />
                                <input type="submit" name="submit" value="Download" class="btn btn-primary btn-sm " />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 mt-3">
                <div class="card h-50">
                    <div class="main-card-body">
                        <div class="row ">
                            <div class="col d-flex align-items-center">
                                <span class="h3 font-bold d-block">All Non Interested</span>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm d-flex justify-content-start">
                            <form action="down.php" method="post">
                                <input type="text" name="all" value="all" hidden />
                                <input type="text" name="interested" value="0" hidden />
                                <input type="submit" name="submit" value="Download" class="btn btn-primary btn-sm " />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 mt-3">
                <div class="card h-50">
                    <div class="main-card-body">
                        <div class="row ">
                            <div class="col d-flex align-items-center">
                                <span class="h3 font-bold d-block">All Placed(Students Details)</span>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm d-flex justify-content-start">
                            <form action="down.php" method="post">
                                <input type="text" name="all" value="all" hidden />
                                <input type="text" name="interested" value="1" hidden />
                                <input type="text" name="placed" value="1" hidden />
                                <input type="text" name="company" value="0" hidden />
                                <input type="submit" name="submit" value="Download" class="btn btn-primary btn-sm " />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 mt-3">
                <div class="card h-50">
                    <div class="main-card-body">
                        <div class="row ">
                            <div class="col d-flex align-items-center">
                                <span class="h3 font-bold d-block">All Placed(Students-Company)</span>
                            </div>
                        </div>
                        <form action="down.php" method="post">
                            <div class="mt-2 mb-0 text-sm d-flex justify-content-start">
                                <input type="text" name="all" value="all" hidden />
                                <input type="text" name="interested" value="1" hidden />
                                <input type="text" name="placed" value="1" hidden />
                                <input type="text" name="company" value="1" hidden />
                                <input type="submit" name="submit" value="Download" class="btn btn-primary btn-sm " />
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-5 mt-3">
                <div class="card h-50">
                    <div class="main-card-body">
                        <div class="row ">
                            <div class="col d-flex align-items-center">
                                <span class="h3 font-bold d-block">All Non-Placed</span>
                            </div>
                        </div>
                        <div class="mt-2 mb-0 text-sm d-flex justify-content-start">
                            <form action="down.php" method="post">

                                <input type="text" name="all" value="all" hidden />
                                <input type="text" name="interested" value="1" hidden />
                                <input type="text" name="placed" value="0" hidden />
                                <input type="submit" name="submit" value="Download" class="btn btn-primary btn-sm " />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <h1></h1>
        <h1>Departmental Data</h1>
        <div class="row">
            <?php
            if ($access == 1) {
                $search = $conn->query("SELECT dept_id,dept_name FROM  `department`");
            } elseif ($access == 2 || $access == 3) {
                $search = $conn->query("SELECT dept_id,dept_name FROM  `department` WHERE dept_id='$dept'");
            }
            while ($row = $search->fetch_assoc()) { ?>


                <div class="col-lg-3 col-md-3 mt-3">
                    <div class="card h-50">
                        <div class="dept-card-body">
                            <div class="row ">
                                <div class="col d-flex align-items-center">
                                    <span class="h3 font-bold d-block"><?php echo $row["dept_name"] ?></span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-1 text-sm d-flex justify-content-start">
                                    <form action="down.php" method="post">
                                        <input type="text" name="all" value="all" hidden />
                                        <input type="text" name="interested" value="1" hidden />
                                        <input type="text" name="department" value="<?php echo $row['dept_id'] ?>" hidden />
                                        <input type="submit" name="submit" value="All Interested" class="btn btn-primary btn-sm " />
                                    </form>
                                </div>
                                <div class="mb-1 text-sm d-flex justify-content-start">
                                    <form action="down.php" method="post">
                                        <input type="text" name="all" value="all" hidden />
                                        <input type="text" name="interested" value="0" hidden />
                                        <input type="text" name="department" value="<?php echo $row['dept_id'] ?>" hidden />
                                        <input type="submit" name="submit" value="All Non Interested" class="btn btn-primary btn-sm " />
                                    </form>
                                </div>
                                <div class="mb-1 text-sm d-flex justify-content-start">
                                    <form action="down.php" method="post">
                                        <input type="text" name="all" value="all" hidden />
                                        <input type="text" name="interested" value="1" hidden />
                                        <input type="text" name="placed" value="1" hidden />
                                        <input type="text" name="company" value="1" hidden />
                                        <input type="text" name="department" value="<?php echo $row['dept_id'] ?>" hidden />
                                        <input type="submit" name="submit" value="Placed" class="btn btn-primary btn-sm " />
                                    </form>
                                </div>
                                <div class="mb-1 text-sm d-flex justify-content-start">
                                    <form action="down.php" method="post">
                                        <input type="text" name="all" value="all" hidden />
                                        <input type="text" name="interested" value="1" hidden />
                                        <input type="text" name="placed" value="0" hidden />
                                        <input type="text" name="department" value="<?php echo $row['dept_id'] ?>" hidden />
                                        <input type="submit" name="submit" value="Non Placed" class="btn btn-primary btn-sm " />
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



            <?php } ?>
        </div>


        <p class="copyright">
            &copy; 2023 - <span>Dhyey Badheka</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>