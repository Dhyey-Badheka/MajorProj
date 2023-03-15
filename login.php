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
                    <i class="fa fa-user-o fa-fw"></i>

                    <select name="typeOfUser" required id="user">
                        <option value="1">Student</option>
                        <option value="2">Company</option>
                        <option value="3">Admin</option>
                    </select>
                </div>
                <div class="row d-none" id="admin">

                    <i class="fa fa-user-o fa-fw"></i>
                    <select name="typeOfAdmin">
                        <option value="4">TPO</option>
                        <option value="5">TPF</option>
                        <option value="6">TPC</option>
                    </select>
                </div>
                <div class="row">
                    <i class="fa fa-envelope-o fa-fw"></i>
                    <input type="text" name="email" placeholder="Email" autocomplete="off" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                </div>
                <div class="pass"><a href="./forgotPassword.php">Forgot password?</a></div>
                <div class="row button">
                    <input type="submit" name="login" value="Login">
                </div>
                <div class="signup-link">Not a member? <a href="./signup.php">Signup now</a></div>
            </form>
        </div>
    </div>
    <!-- Footer -->
    <?php include("./core/footer.php") ?>
    <script>
        // var admin = document.getElementById('admin');
        // document.getElementById('user').addEventListener('change', (event) => {
        //     if (event.target.value == 3) {
        //         admin.classList.remove("d-none");
        //     }
        //     if (event.target.value != 3) {
        //         admin.classList.add("d-none");
        //     }
        // })
        $(document).ready(function() {

            $('#user').change(function() {
                if ($(this).val() == "3") {
                    $("#admin").removeClass("d-none");
                } else {
                    $("#admin").addClass("d-none")
                }

            })
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>