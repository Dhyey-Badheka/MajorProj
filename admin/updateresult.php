<?php

include("../database.php");
include("../helper/authorization.php");
if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}

$updateSuccess = 0;
$updateFailure = 0;
$title = "";
$desc = "";
$id = "";
$dateAnnouce = "";
$ids = array();

if (isset($_GET["deleteId"])) {
    $id = $_GET["deleteId"];
    $delete = $conn->query("DELETE FROM result WHERE result_id = '$id'");
    if ($conn->affected_rows) {
        echo "<script> window.location.href = 'http://localhost/tpc-main/admin/results.php'; </script>";
    }
}

if (isset($_GET["updateId"]) || isset($_POST["id"])) {
    $id = isset($_GET["updateId"]) ? $_GET["updateId"] : $_POST["id"];
    $search = $conn->query("SELECT * FROM  `result` WHERE result_id = '$id'");

    if ($search->num_rows == 1) {
        $row = $search->fetch_assoc();
        $title = $row["heading"];
        $desc = $row["description"];
        $dateAnnouce = $row["posted_on"];
        $no_of_stu = $row["no_of_stu"];
        $drive_id = $row["drive_id"];
        $comp_id = $row["comp_id"];;
        $ids = json_decode($row["student_placed"], true);
    }
    // var_dump($isAll);
}
if (isset($_POST["update-result"])) {
    $title = $_POST["update-title"];
    $desc = $_POST["update-desc"];
    $ids = array();
    foreach ($_POST["update_ids"] as $selected) {
        array_push($ids, $selected);
    }
    $no_of_stu = count($_POST["update_ids"]);
    $arr_json = json_encode($ids);
    $update = $conn->query("UPDATE `result` SET heading='$title', description='$desc', no_of_stu='$no_of_stu', student_placed='$arr_json' WHERE result_id = '$id'");

    if ($conn->affected_rows) {
        $updateSuccess = 1;
    } else {
        // var_dump($conn->error_list);
        $updateFailure = 1;
    }
}
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($updateSuccess == 1 || $updateFailure == 1) : ?>
        <meta http-equiv="refresh" content="2;url=http://localhost/tpc-main/admin/results.php" />
    <?php endif ?>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <!-- <link rel="stylesheet" href="./helper/index.css"> -->
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/addresult.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>Update Result</title>
</head>

<script type="text/javascript">
    function addRows() {
        var table = document.getElementById('emptbl');
        var rowCount = table.rows.length; //4
        var cellCount = table.rows[0].cells.length; //1
        var row = table.insertRow(rowCount); //4
        for (var i = 0; i < cellCount; i++) {
            var cell = 'cell' + i;
            cell = row.insertCell(i);
            var copycel = document.getElementById('col' + i).innerHTML;
            cell.innerHTML = copycel;
        }
    }

    function deleteRows() {
        var table = document.getElementById('emptbl');
        var rowCount = table.rows.length;
        if (rowCount > '1') {
            var row = table.deleteRow(rowCount - 1);
            rowCount--;
        } else {
            alert('There should be atleast one row');
        }
    }
</script>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row  d-flex justify-content-center">
                        <?php if ($updateSuccess == 1) : ?>
                            <p class="bg-success text-white text-center">Successfully Updated </p>
                        <?php endif ?>
                        <?php if ($updateFailure == 1) : ?>
                            <p class="bg-danger text-white text-center">Error in Updating the Result </p>
                        <?php endif ?>
                        <form action="./updateresult.php" method="post">
                            <div class="container">
                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Update A Result </h6>
                                                <div class="col d-flex justify-content-start">
                                                    <p class="m-b-5 f-w-600">Date</p>
                                                    <p class="mx-10">:</p>
                                                    <p class="mx-10"><?php echo $dateAnnouce ?></p>
                                                </div>
                                                <form action="./updateresult.php" method="post">
                                                    <input type="text" name="id" value="<?php echo $id ?>" hidden>
                                                    <div class="col">
                                                        <p class="m-b-5 f-w-600 anno">Company Name</p>
                                                        <input type="text" class="m-b-5 form-control" name="comp_id" value="<?php $search = $conn->query("SELECT comp_name FROM  `company` WHERE comp_id = '$comp_id'");
                                                                                                                            if ($search->num_rows == 1) {
                                                                                                                                $row = $search->fetch_assoc();
                                                                                                                                $comp_name = $row["comp_name"];
                                                                                                                                echo "$comp_name ";
                                                                                                                            }
                                                                                                                            ?>">

                                                    </div>
                                                    <div class="col">
                                                        <p class="m-b-5 f-w-600 anno">Role Name</p>
                                                        <input type="text" class="m-b-5 form-control" name="update-role-name" value=<?php $search = $conn->query("SELECT job_role FROM  `drive` WHERE drive_id = '$drive_id'");
                                                                                                                                    if ($search->num_rows == 1) {
                                                                                                                                        $row = $search->fetch_assoc();
                                                                                                                                        echo $row["job_role"];
                                                                                                                                    }
                                                                                                                                    ?>>

                                                    </div>

                                                    <div class=" col">
                                                        <p class="m-b-5 f-w-600 anno">Title</p>
                                                        <input type="text" class="m-b-5 form-control" name="update-title" id="" value="<?php echo $title   ?>">
                                                    </div>

                                                    <div class="col">
                                                        <p class="m-b-5 f-w-600 anno">Description</p>
                                                        <input type="text" class="m-b-5 form-control" name="update-desc" id="" value="<?php echo $desc ?>">
                                                    </div>
                                                    <div class="col">
                                                        <p class="m-b-5 f-w-600 anno">ID Numbers:</p>
                                                    </div>
                                                    <div class="tabl">
                                                        <form action="./updateresult.php" method="post">
                                                            <table id="emptbl">
                                                                <?php
                                                                $search = $conn->query("SELECT * FROM  `result` where result_id='$id'");
                                                                $row = $search->fetch_assoc();
                                                                $arr = json_decode($row["student_placed"], true);
                                                                for ($i = 0; $i < count($arr); $i++) {
                                                                ?><tr>
                                                                        <td id="col<?php echo $i ?>">
                                                                            <input class="form-control" type="text" name="update_ids[]" value="<?php echo $arr[$i] ?>" />
                                                                        </td>
                                                                    </tr>
                                                                <?php } ?>
                                                            </table>
                                                            <table>
                                                                <tr>
                                                                    <td><input type="button" value="Add Row" onclick="addRows()" class="text-center btn btn-success m-5" /></td>
                                                                    <td><input type="button" value="Delete Row" onclick="deleteRows()" class="text-center btn btn-danger m-5" /></td>
                                                                    <td><input type="submit" value="Submit" name="update-result" class="text-center btn btn-primary m-5" /></td>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button class="text-center btn btn-primary">Add </button>
                            </div>
                    </div>
        </main>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./helper/sidebar.js"></script>

</body>

</html>