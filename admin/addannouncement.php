<?php

include("../database.php");
include("../helper/authorization.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';


if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}

// add the annoucement

$insertSuccess = 0;
$insertFailure = 0;


if (isset($_POST["add-annouce"])) {
    $title = mysqli_real_escape_string($conn, $_POST["annouce-heading"]);
    $desc = mysqli_real_escape_string($conn, $_POST["annouce-desc"]);
    $deptEligible = array();
    foreach ($_POST["eligible_dept"] as $selected) {
        if ($selected == 0) {
            for ($i = 1; $i <= 8; $i++) {
                array_push($deptEligible, intval($i));
            }
            break;
        } else {
            array_push($deptEligible, intval($selected));
        }
    }
    $deptEligible = json_encode($deptEligible);
    // var_dump($deptEligible);
    $insert = $conn->query("INSERT INTO `announcement`( `title`, `description`,  `dept`) VALUES ('$title','$desc','$deptEligible')");

    $select = $conn->query("select * from credentials");
    $row = $select->fetch_assoc();
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $encrypted_username = $row["enc_username"];
    $encrypted_password = $row["enc_password"];
    // $encrypted_username = openssl_encrypt($username, "AES-256-CBC", $secret_key, 0);
    // $encrypted_password = openssl_encrypt($password, "AES-256-CBC", $secret_key, 0);
    // echo $encrypted_username . " <br>";
    // echo $encrypted_password . " <br>";
    $secret_key = $row["secret_key"];
    $decrypted_username = openssl_decrypt($encrypted_username, "AES-256-CBC", $secret_key);
    $decrypted_password = openssl_decrypt($encrypted_password, "AES-256-CBC", $secret_key);

    // echo $decrypted_username . " <br>";
    // echo $decrypted_password . " <br>";
    $mail->Username = $decrypted_username;
    // $mail->Username = 'badhekadhyey@gmail.com';
    // $secret_key = $row["enc_password"];
    $mail->Password = $decrypted_password;
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom($row["email"]);
    // $mail->setFrom('badhekadhyey@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = $title;



    // $deptEligible = array($deptEligible);
    // $str = '(';
    // for ($i = 1; $i < strlen($deptEligible[0]); $i += 2) {
    //     $str .= $deptEligible[0][$i] . ",";
    // }
    // $str .= ")";
    // $str = str_replace(",)", ")", $str);
    // echo $str;
    // $search = $conn->query("select student.first_name,student.pemail from student where dept_id in $str");


    $applieddept = json_decode($deptEligible, true);
    $sql = "select student.first_name,student.pemail from student where dept_id in (" . implode(',', $applieddept) . ");";
    $search = $conn->query($sql);
    // while ($row = $search->fetch_assoc()) {
    //     echo $row["name"] . "<br>";
    // }

    while ($row = $search->fetch_array(MYSQLI_NUM)) {
        if ($row[1] != null) {
            $mail->addAddress($row[1]);
            $str = "Hello $row[0],<br>Greetings from Training and Placement Cell !!<br><br>" . "<br>" . $title . "<br>" . $desc;
            $mail->Body = $str;
            $mail->isHTML(true);
            $mail->send();
            $mail->clearAllRecipients();
            $mail->clearAddresses();
        }
    }
    // echo "Sent successfully";
    echo "<script>
        document.location.href='announcements.php';
        </script>";









    if ($conn->affected_rows) {
        $insertSuccess = 1;
    } else {
        $insertFailure = 1;
    }
    // var_dump($insert);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($insertSuccess == 1 || $insertFailure == 1) : ?>
        <meta http-equiv="refresh" content="5;url=http://localhost/tpc-main/admin/announcements.php" />
    <?php endif ?>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>Add Announcement</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row  d-flex justify-content-center">
                        <?php if ($insertSuccess == 1) : ?>
                            <p class="bg-success text-white text-center">Successfully Added </p>
                        <?php endif ?>
                        <?php if ($insertFailure == 1) : ?>
                            <p class="bg-danger text-white text-center">Error in Adding the Annoucement </p>
                        <?php endif ?>
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Add An Announcement</h6>
                                        <div class="col d-flex justify-content-start">
                                            <p class="m-b-5 f-w-600">Date</p>
                                            <p class="mx-10">:</p>
                                            <?php $date = date("Y-m-d");
                                            ?>
                                            <p class="mx-10"><?php echo $date ?></p>
                                        </div>
                                        <form action="./addannouncement.php" method="post">
                                            <input type="datetime-local" name="annouce-date" id="" value="<?php echo $date; ?>" hidden>

                                            <div class="col">
                                                <p class="m-b-5 f-w-600 anno">Heading</p>
                                                <input type="text" class="m-b-5 form-control" name="annouce-heading" id="" placeholder="Enter Title of Annoucement">
                                            </div>
                                            <div class="col">
                                                <p class="m-b-5 f-w-600 anno">Description</p>
                                                <input type="text" class="m-b-5 form-control" name="annouce-desc" id="" placeholder="Enter Description of Annoucement">
                                            </div>
                                            <!-- <div class="col">
                                                <p class="m-b-5 f-w-600 anno">Date</p>
                                                <input type="date" class="m-b-5 form-control" name="annouce-date" id="" value="">
                                            </div> -->
                                            <div class="col">
                                                <p class="m-b-5 f-w-600 anno">Department</p>
                                                <div class="row">
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="0"><label class="form-check-label"> All Department</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="1"><label class="form-check-label">Civil</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="2"><label class="form-check-label"> Computer</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="3"><label class="form-check-label"> Electronics and Communications</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="4"><label class="form-check-label"> Electrical</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="5"><label class="form-check-label"> Electronics</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="6"><label class="form-check-label">Information Technology</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="7"><label class="form-check-label">Mechanical</label>
                                                    </div>
                                                    <div class="form-check col-sm-3">
                                                        <input type="checkbox" class="form-check-input" name="eligible_dept[]" id="" value="8"><label class="form-check-label">Production</label>
                                                    </div>
                                                </div>

                                            </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <button class="text-center btn btn-primary">Add </button> -->
                        <input type="submit" value="Add" name="add-annouce" class="text-center btn btn-primary">
                        </form>
                    </div>
                </div>
        </main>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./helper/sidebar.js"></script>

</body>

</html>