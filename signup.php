<?php

include("./database.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("./core/header.php")    ?>
    <link rel="stylesheet" href="./css/signup.css">

    <title>Home</title>
</head>

<body>
    <!-- Navigation bar -->
    <?php require_once("./core/nav.php") ?>

    <!-- Signup -->
    <div class="container">
        <div class="title">Registration</div>
        <div class="content">
            <form action="./addUser.php" method="POSt" onsubmit="validate()">
                <div class="user-details">
                    <div class="input-box">
                        <span class="details">Regular or D2D</span>
                        <select name="typeStudent" id="typeStudent">
                            <option value="1">Regular</option>
                            <option value="2">Diploma to Degree (D2D)</option>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">ID Number</span>
                        <input type="text" name="id" placeholder="Enter your ID number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Email</span>
                        <input type="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Mobile Number</span>
                        <input type="number" name="mobile" placeholder="Enter your number" required>
                    </div>
                    <div class="input-box">
                        <span class="details">Password</span>
                        <input type="password" name="password" id="password" placeholder="Enter your password" required>
                        <span class="extra"> Must be 8 character long </br> Must include atleast one digit </span>

                    </div>
                    <div class="input-box">
                        <span class="details">Department</span>
                        <select name="department" id="dept">
                            <option value="0" selected>Select Your Department</option>
                            <?php
                            $dept = "SELECT * FROM department";
                            $result = mysqli_query($conn, $dept);
                            while ($row = $result->fetch_assoc()) {
                            ?>
                                <option value="<?php echo $row["dept_id"] ?>"><?php echo $row["dept_name"] ?></option>
                            <?php

                            }

                            ?>
                        </select>
                    </div>
                    <div class="input-box">
                        <span class="details">Confirm Password</span>
                        <input type="password" id="cPassword" placeholder="Confirm your password" required>
                    </div>
                </div>
                <div class="gender-details">
                    <input type="radio" name="gender" value="male" id="dot-1">
                    <input type="radio" name="gender" value="female" id="dot-2">
                    <input type="radio" name="gender" value="other" id="dot-3">
                    <span class="gender-title">Gender</span>
                    <div class="category">
                        <label for="dot-1">
                            <span class="dot one"></span>
                            <span class="gender">Male</span>
                        </label>
                        <label for="dot-2">
                            <span class="dot two"></span>
                            <span class="gender">Female</span>
                        </label>
                        <label for="dot-3">
                            <span class="dot three"></span>
                            <span class="gender">Prefer not to say</span>
                        </label>
                    </div>
                </div>
                <div class="button">
                    <input type="submit" name="register" value="Register">
                </div>
                <div class="signup-link">Already Registered <a href="./login.php">Login now</a></div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php require_once("./core/footer.php") ?>


</body>

</html>