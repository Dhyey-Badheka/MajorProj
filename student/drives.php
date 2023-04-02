<?php

$reqFor = "regis";
include("../database.php");
include("./helper/authorization.php");
$query = "SELECT * FROM student WHERE pemail = '$adminUserEmail' AND oauth_uid='$adminUserAuth' and is_registered='1' and is_approved='1'";
$check_result = $conn->query($query);
$row = $check_result->fetch_assoc();
$name = $row["first_name"] . " " . $row["last_name"];
$dept = $row["dept_id"];
$id_number = $row["id_number"];
// $query = "SELECT applied_stu FROM `drive` , `company` where drive.comp_id=company.comp_id;";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/drive.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Students</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/student/helper/index.js"></script>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <h1>Welcome <?php echo $name ?>,Your Applied Drives</h1>
        <h5>Below you will find job roles you have applied for</h5>
        <?php
        $query = "SELECT applied_stu,drive_id FROM `drive` , `company` where drive.comp_id=company.comp_id;";
        $search = $conn->query($query);
        while ($row = $search->fetch_assoc()) {
            $applied_stu = $row["applied_stu"];
            $drive_id = $row["drive_id"];
            $applied_stu = json_decode($applied_stu, true);
            $sql = "select comp_name,job_role,timestamp from drive,company,stu_drive where '$id_number' in ('" . implode('\',\'', $applied_stu)  . "') and drive.drive_id='$drive_id' and company.comp_id=drive.comp_id and stu_drive.stu_email_id='$adminUserEmail' and stu_drive.drive_id='$drive_id'";
            // echo "<br>" . $sql . "<br>";
            $search1 = $conn->query($sql);
            if ($search1 != null && $search1->num_rows == 1) {
                $row1 = $search1->fetch_assoc();
        ?>
                <div class="p-5 bg-light" style="margin-top: 30px;">
                    <h3 class="mb-3 he"><?php echo $row1["comp_name"] . " - " . $row1["job_role"]; ?></h3>
                    <p><i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $row1["timestamp"] ?></p>
                    <span>Application Submitted to admin</span>
                </div>
        <?php }
        } ?>




        <p class="copyright">
            &copy; 2023 - <span>Dhyey Badheka</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>