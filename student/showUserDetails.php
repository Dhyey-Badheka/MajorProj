<?php

$reqFor = "show";
include("../database.php");
include("./helper/authorization.php");

// Session


?>
<!DOCTYPE html>

<html>

<head>
    <?php include("../core/header.php") ?>
    <link rel="stylesheet" href="../core/css/details.css">
    <link rel="stylesheet" href="../core/css/nav.css">
    <link rel="stylesheet" href="../core/css/footer.css">
    <link rel="stylesheet" href="../css/details.css">

    <title>User</title>
</head>

<body>

    <?php include("../core/nav.php") ?>


    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Succesfully Registered</span></div>
            <div class="details">
                <p>User Name : <strong> <?php echo $adminUserEmail ?> </strong>
                </p>
                <p>Your account is in <strong>IN-ACTIVE</strong> state. It will be active only once it is approved by TPC of your department. </p>
                <p>Once you are approved by <strong>TPC</strong> you can login back.</p>
                <p><a href="../index.php"> HOME </a></p>
            </div>
        </div>
    </div>


    <?php include("../core/footer.php") ?>

</body>

</html>