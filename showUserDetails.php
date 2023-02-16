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
                <p> Your account is in <strong>IN-ACTIVE</strong> state. It will be active only if you fill in all the details in your profile including all supporting documents once you <a href="./login.php"> LOGIN </a> </p>
                <p> Once you fill your details <strong>ADMIN</strong> will approve your profile.</p>
            </div>
        </div>
    </div>


    <?php include("./core/footer.php") ?>

</body>

</html>