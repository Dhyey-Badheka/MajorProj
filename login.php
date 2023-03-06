<?php

session_start();

if (isset($_SESSION["showUser"])) {
    unset($_SESSION["showUser"]);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("./core/header.php") ?>
    <link rel="stylesheet" href="./css/login.css">
    <title>Login</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <!-- Navigation Bar -->
    <?php include("./core/nav.php") ?>
    <!-- Login -->
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Login Form</span></div>
            <form action="./checkLogin.php" method="POST">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="email" name="email" placeholder="Enter your email" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Enter your Password" required>
                </div>
                <div class="radiorow">
                    TPO<input type="radio" id="TPO" name="user_type" value="0">
                    TPF<input type="radio" id="TPF" name="user_type" value="1">
                    TPC<input type="radio" id="TPC" name="user_type" value="2">
                    Student<input type="radio" id="student" name="user_type" value="3" checked>
                </div>
                <div class="pass"><a href="./forgotPassword.php">Forgot password?</a></div>
                <div class="row button">
                    <input type="submit" name="login" value="Login">
                </div>
                <br>
                <div class="signup-link">Not a member? <a href="./signup.php">Signup now</a></div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include("./core/footer.php") ?>

</body>

</html>