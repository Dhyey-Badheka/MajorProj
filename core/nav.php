<?php


// include("./helper/authorization.php");
require 'E:\software\xamp\htdocs\tpc-main\vendor\autoload.php';
// Creating new google client instance
$client = new Google_Client();
// Enter your Client ID
$client->setClientId('827275232615-9j4dc5f1m69dfd2cird35cao2ivnskii.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/tpc-main/checkUser.php');
// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");

if (isset($_SESSION["showUser"])) {
    unset($_SESSION["showUser"]);
}


if (!isset($_GET["code"])) {
?>

    <nav class="navbar">

        <!-- LOGO -->

        <div class="logo">
            <img src="http://localhost/tpc-main/images/logo.png" style="height:80px;width:80px;"></img>
            Training &amp Placement Cell
        </div>
        <!-- NAVIGATION MENU -->

        <ul class="nav-links">

            <!-- USING CHECKBOX HACK -->

            <input type="checkbox" id="checkbox_toggle" />

            <label for="checkbox_toggle" class="hamburger">&#9776;</label>

            <!-- NAVIGATION MENUS -->

            <div class="menu">

                <li><a href="index.php">Home</a></li>
                <li><a href="/tpc-main/teams.php">Team</a></li>
                <li><a href="/tpc-main/announcements.php">Announcements</a></li>
                <li><a href="/tpc-main/results.php">Results</a></li>
                <!-- <li><a href="login.php" class="login">Login</a></li> -->
                <li><a href="<?php echo $client->createAuthUrl(); ?>"><input type="button" name="login" class="login-with-google-btn" value="Login" /></a></li>
            </div>

        </ul>

    </nav>
<?php } ?>