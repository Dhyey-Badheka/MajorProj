<?php
include("../database.php");
include("../helper/authorization.php");

if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}
mysqli_select_db($conn, 'tpc');
$id = $_GET["id"];
$zip = new ZipArchive();
$date = date('YmdHis');
echo $date;
$sql = "SELECT job_role,comp_name FROM `drive`,`company` where drive_id='$id' and drive.comp_id=company.comp_id";
$search = mysqli_query($conn, $sql);
$row = $search->fetch_assoc();
$file = $row["comp_name"] . $row["job_role"] . $date . ".zip";
$zip->open($file, ZipArchive::CREATE);
$query = "select stu_email_id,resumeType from stu_drive where drive_id='$id'";
$stmt = $conn->query($query);
while ($row = $stmt->fetch_assoc()) {
    $ema = $row["stu_email_id"];
    if ($row["resumeType"] == '1') {
        $query = "select primary_resume from student_document where s_email='$ema'";
        $stmt1 = $conn->query($query);
        $row1 = $stmt1->fetch_assoc();
        $resumeName = $row1["primary_resume"];
    } else if ($row["resumeType"] == '2') {
        $query = "select resume from student_document where s_email='$ema'";
        $stmt1 = $conn->query($query);
        $row1 = $stmt1->fetch_assoc();
        $resumeName = $row1["resume"];
    }
    $path = "../student/uploads/" . $ema . "/" . $resumeName;
    echo $path . "<br>";
    if (file_exists($path)) {
        $zip->addFile($path, basename($path));
    }
}
$zip->close();
if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/zip');
    header('Content-Disposition: attachment; filename=' . basename($file));
    header('Content-Transfer-Encoding: binary');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
} else {
    die('Error: The file ' . $file . ' does not exist.');
}
