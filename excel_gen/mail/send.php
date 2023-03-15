<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';
echo "hi"
?>
<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "demodb";

// Connection Object
$conn = new mysqli($serverName, $userName, $password, $dbName);

// If error occurs then display the error
if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
}
echo "connected";
if (isset($_POST["send"])) {
    $create = 'INSERT INTO `announcement` (`title`, `descr`, `posted_on`) VALUES ( $_POST["title"], $_POST["des"], $_POST["date"]);';
    if ($conn->query($create)) {
        echo "added to database";
    } else {
        echo "Error Occured on adding to table";
    }

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'badhekadhyey@gmail.com';
    $mail->Password = 'kjohaebcqvsbijey';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->setFrom('badhekadhyey@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = $_POST["title"];
    $result = $conn->query("select Name,email from placed_stu");
    while ($row = $result->fetch_array(MYSQLI_NUM)) {
        if ($row[1] != null) {
            $mail->addAddress($row[1]);
            $str = "Hi $row[0]," . "<br>" . $_POST["title"];
            $mail->Body = $str;
            $mail->isHTML(true);
            $mail->send();
            $mail->clearAllRecipients();
            $mail->clearAddresses();
        }
    }
    echo "Sent successfully";
    echo "<script>
        document.location.href='index.php';
        </script>";
}
?>