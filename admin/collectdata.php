<?php
include("../database.php");
include("../helper/authorization.php");

if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}
mysqli_select_db($conn, 'tpc');
$id = $_GET["id"];
createExcel();
echo "<script> window.location.href = 'http://localhost/tpc-main/admin/trial.php?id=" . $id . "'; </script>";
// createZip();
function createExcel()
{
    global $conn;
    global $id;
    $sql = "SELECT job_role,comp_name FROM `drive`,`company` where drive_id='$id' and drive.comp_id=company.comp_id";
    $search = mysqli_query($conn, $sql);
    while ($row = $search->fetch_assoc()) {
        $columnHeader = '';
        $columnHeader = "\t" . "Birla Vishvakarma Mahavidyalaya" .   "\n"  . "\t" . "An Autonomous Institution" .   "\n" . "\t" . "Vallabh Vidyanagar-Anand 388120" .   "\n" . "\t" . $row["comp_name"] . " - " . $row["job_role"] .   "\n"  . "\n"  . "Sr. No." . "\t" . "Student ID" . "\t" . "Student Name" . "\t" . "Department" . "\t" . "Phone" . "\t" . "Email" . "\t" . "Gender" . "\t" . "SSC %" . "\t" . "HSC %" . "\t" . "D2D CPI" . "\t" . "Current CPI" . "\t" . "Active Backlogs";
    }

    $setData = '';
    $sql = "select applied_stu from drive where drive_id='$id'";
    $search = $conn->query($sql);
    $row = $search->fetch_assoc();
    $applied_stu = $row["applied_stu"];
    // var_dump($applied_stu);
    // $applied_stu = str_replace('"', '', $applied_stu);
    $applied_stu = json_decode($applied_stu, true);
    // var_dump($applied_stu);
    $sql = "select ROW_NUMBER() OVER (ORDER BY  id_number),id_number,concat(first_name,' ',middle_name,' ',last_name),department.dept_name,mobile,pemail,gender,ssc_th_percentage,hsc_th_percentage,d2d_cgpa,bvm_cpi,bvm_active_backlog from student,student_academic,department where LOWER(id_number) in ('" . implode('\',\'', $applied_stu)  . "') and student.id_number=student_academic.s_id and student.dept_id=department.dept_id;";

    // echo "<br>" . $sql . "<br>";
    // $search = $conn->query($sql);
    // while ($row = $search->fetch_assoc()) {
    $setRec = mysqli_query($conn, $sql);
    while ($rec = mysqli_fetch_row($setRec)) {
        $rowData = '';
        foreach ($rec as $value) {
            $value = '"' . $value . '"' . "\t";
            $rowData .= $value;
        }
        $setData .= trim($rowData) . "\n";
    }

    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=Result_Detail.xls");
    header("Pragma: no-cache");
    header("Expires: 0");
    echo ucwords($columnHeader) . "\n" . $setData . "\n";
}
function  createZip()
{
    global $conn;
    global $id;
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
}
