<?php

include("./database.php");

$user_id = $_GET["user_id"];

?>
<!DOCTYPE html>

<html>

<head>
    <?php include("./core/header.php") ?>
    <link rel="stylesheet" href="./css/details.css">

    <title>User</title>
</head>

<body>

    <?php include("./core/nav.php") ?>


    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Succesfully Registered</span></div>
            <div class="details">
                <p>User Name : <strong> <?php echo $user_id ?> </strong>
                </p>
                <p> Your account is in <strong>IN-ACTIVE</strong> state. It will be active only once it is approved by TPC of your department. </p>
                <p> Once you are approved by <strong>TPC</strong> you can login from below and must fill your other details.</p>
                <p><a href="./login.php"> LOGIN </a></p>
            </div>
        </div>
    </div>


    <?php include("./core/footer.php") ?>

</body>

</html>