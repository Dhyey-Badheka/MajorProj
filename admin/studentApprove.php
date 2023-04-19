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
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>


    <title>Approve Student</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <main>

        <!-- <h1>Student</h1> -->
        <div class="container-fluid">
            <div class="mb-npx">
                <div class="row align-items-center">
                    <div class="col-sm-6 col-12 mb-4 mb-sm-0">
                        <h1 class="h2 mb-0 ls-tight">Welcome, TPC</h1>
                    </div>
                    <div class="col-sm-6 col-12 text-sm-end">
                        <div class="mx-n1">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <?php
            if ($access == 1) {
                $query = "SELECT * FROM  `student` where is_registered=1;";
                $result = mysqli_query($conn, $query);
            } elseif ($access == 2 || $access == 3) {
                $query = "SELECT * FROM  `student` WHERE dept_id='$dept' and  is_registered=1 and is_approved=0;";
                // $query = "SELECT * FROM  `student`;";
                $result = mysqli_query($conn, $query);
            }
            ?>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <div class="col-lg-4 col-md-6 mb-4 mt-5">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row ">
                                <div class="col d-flex align-items-center">
                                    <span class="h3 font-bold d-block"><?php echo $row["id_number"] ?> - <?php
                                                                                                            $dept_id = $row["dept_id"];
                                                                                                            $search = $conn->query("SELECT dept_name FROM  `department` WHERE dept_id='$dept_id'");
                                                                                                            $row1 = $search->fetch_assoc();
                                                                                                            echo $row1["dept_name"] ?></span>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col d-flex align-items-center">
                                    <span class="h3 font-semibold mb-0"><?php echo $row["first_name"] . " " . $row["last_name"]; ?></span>
                                </div>
                                <!-- </div> -->
                            </div>
                            <div class="mt-2 mb-0 text-sm d-flex justify-content-start">

                                <a href="./viewStudent.php?id=<?php echo $row["id_number"] ?>" class="btn btn-primary btn-sm ">View</a>
                                <a href="./viewStudent.php?id=<?php echo $row["id_number"] ?>" class="btn btn-success btn-sm mx-2" value="Approve" name="approval">Approve</a>
                                <a href="./viewStudent.php?id=<?php echo $row["id_number"] ?>" class="btn btn-danger btn-sm " value="Reject" name="approval">Reject</a>

                            </div>
                        </div>
                    </div>
                </div>

            <?php }
            ?>


            <p class="copyright">
                &copy; 2023 - <span>Dhyey Badheka</span> All Rights Reserved.
            </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>