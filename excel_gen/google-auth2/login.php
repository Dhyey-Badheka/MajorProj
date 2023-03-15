<?php
require 'db_connection.php';

if (isset($_SESSION['login_id'])) {
    header('Location: home.php');
    exit;
}

require 'google-api/vendor/autoload.php';

$client = new Google_Client();

// Enter your Client ID
$client->setClientId('827275232615-9j4dc5f1m69dfd2cird35cao2ivnskii.apps.googleusercontent.com');
// Enter your Client Secrect
$client->setClientSecret('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');
// Enter the Redirect URL
$client->setRedirectUri('http://localhost/tpc-main/excel_gen/google-auth2/login.php');

// Adding those scopes which we want to get (email & profile Information)
$client->addScope("email");
$client->addScope("profile");


if (isset($_GET['code'])) :

    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);

    if (!isset($token["error"])) {

        $client->setAccessToken($token['access_token']);

        // getting profile information
        $google_oauth = new Google_Service_Oauth2($client);
        $google_account_info = $google_oauth->userinfo->get();

        // Storing data into database
        $id = mysqli_real_escape_string($db_connection, $google_account_info->id);
        $full_name = mysqli_real_escape_string($db_connection, trim($google_account_info->name));
        $email = mysqli_real_escape_string($db_connection, $google_account_info->email);


        // checking user already exists or not
        $get_user = mysqli_query($db_connection, "SELECT `stuid` FROM `placed_stu` WHERE `oauth_uid`='$id'");
        if (mysqli_num_rows($get_user) > 0) {

            $_SESSION['login_id'] = $id;
            header('Location: home.php');
            exit;
        } else {

            // if user not exists we will insert the user
            $insert = mysqli_query($db_connection, "INSERT INTO `placed_stu`(`name`,`email`,`oauth_uid`) VALUES('$full_name','$email','$id')");

            if ($insert) {
                $_SESSION['login_id'] = $id;
                header('Location: home.php');
                exit;
            } else {
                echo "Sign up failed!(Something went wrong).";
            }
        }
    } else {
        header('Location: login.php');
        exit;
    }

else :
    // Google Login Url = 
    $client->createAuthUrl();
?>

    <a class="login-btn" href="<?php echo $client->createAuthUrl(); ?>">Login</a>

<?php endif; ?>