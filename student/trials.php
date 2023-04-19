<?php require '../vendor/autoload.php';
// $reqFor = "regis";
include("../database.php");
// include("./helper/authorization.php");

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();
ob_start();
if (isset($_GET["id"])) {
    include('content.php');
}
$html_code = ob_get_clean();
$html2pdf->writeHTML($html_code);
$fileName6 = $_GET["id"] . "resume.pdf";

$path = "E:/software/xamp/htdocs/tpc-main/student/uploads/" . $_GET["id"];
if (!file_exists($path)) {
    mkdir($path, 0777, true);
}
$targetFilePath = $path . "/" . $fileName6;
if (file_exists($targetFilePath)) {
    unlink($targetFilePath);
}
$html2pdf->output($targetFilePath, $dest = 'F');
$sql = "update student_document set primary_resume='" . $fileName6 . "' where s_email='" . $_GET['id'] . "'";
$update = $conn->query($sql);
// $from = "C:/Users/Dhyey Badheka/Downloads/" . $fileName6;
// if (move_uploaded_file($from, $targetFilePath)) {
//     echo "<script> window.location.href = ./announcements.php; </script>";
// } else {
//     echo "<script> console.log('false') </script>";
//     echo "false";
// }