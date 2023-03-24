<?php

include("../database.php");
include("../helper/authorization.php");
if ($access == 2 || $access == 3) {
    $dept = $_SESSION["adminDept"];
}
if ($access == 1 || $access == 2) {
} else {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}

$updateSuccess = 0;
$updateFailure = 0;
$id = "";

if (isset($_GET["deleteid"])) {
    $id = $_GET["deleteid"];
    $delete = $conn->query("DELETE FROM tpc WHERE tpc_id = '$id'");
    if ($conn->affected_rows) {
        echo "<script>
    window.location.href = 'http://localhost/tpc-main/admin/tpc.php';
</script>";
    }
}
if (isset($_GET["inactiveid"])) {
    $id = $_GET["inactiveid"];
    $delete = $conn->query("UPDATE `tpc` SET `isActive` = '0' WHERE `tpc_id` = '$id';");
    if ($conn->affected_rows) {
        echo "<script>
    window.location.href = 'http://localhost/tpc-main/admin/tpc.php';
</script>";
    }
}
if (isset($_GET["activeid"])) {
    $id = $_GET["activeid"];
    $delete = $conn->query("UPDATE `tpc` SET `isActive` = '1' WHERE `tpc_id` = '$id';");
    if ($conn->affected_rows) {
        echo "<script>
    window.location.href = 'http://localhost/tpc-main/admin/tpc.php';
</script>";
    }
}
