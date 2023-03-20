<?php

include("../database.php");
include("../helper/authorization.php");
if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}

$addSuccess = 0;
$addFailure = 0;
$title = "";
$desc = "";
$id = "";
$comp_id = "";
$dateAnnouce = "";
$ids = array();

if (isset($_POST["add-result"])) {
    $title = $_POST["result-heading"];
    $desc = $_POST["result-desc"];
    $comp_id = $_POST["add-comp_id"];
    $role_id = $_POST["add-role_id"];
    $ids = array();
    foreach ($_POST["add_ids"] as $selected) {
        array_push($ids, $selected);
    }
    $date_annouce = $_POST["annouce-date"];
    $no_of_stu = count($_POST["add_ids"]);
    $arr_json = json_encode($ids);
    $update = $conn->query("INSERT INTO `result` (`heading`, `description`, `no_of_stu`, `posted_on`, `student_placed`, `drive_id`, `comp_id`) VALUES
('$title', '$desc', '$no_of_stu', '$date_annouce', '$arr_json', '$comp_id', '$role_id');");

    if ($conn->affected_rows) {
        $addSuccess = 1;
    } else {
        // var_dump($conn->error_list);
        $addFailure = 1;
    }
}
?>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($addSuccess == 1 || $addFailure == 1) : ?>
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
                        <?php if ($addSuccess == 1) : ?>
                            <p class="bg-success text-white text-center">Successfully Added </p>
                        <?php endif ?>
                        <?php if ($addFailure == 1) : ?>
                            <p class="bg-danger text-white text-center">Error in Adding the Result </p>
                        <?php endif ?>
                        <form action="./addresult.php" method="post">
                            <div class="container">
                                <div class="card user-card-full">
                                    <div class="row m-l-0 m-r-0">
                                        <div class="col">
                                            <div class="card-block">
                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Add A Result </h6>
                                                <div class="col d-flex justify-content-start">
                                                    <p class="m-b-5 f-w-600">Date</p>
                                                    <p class="mx-10">:</p>
                                                    <?php $date = date("Y-m-d");
                                                    ?>
                                                    <p class="mx-10"><?php echo $date ?></p>
                                                </div>
                                                <form action="./addresult.php" method="post">
                                                    <input type="text" name="annouce-date" id="" value="<?php echo $date; ?>" hidden>
                                                    <div class="col">
                                                        <p class="m-b-5 f-w-600 anno">Heading</p>
                                                        <input type="text" class="m-b-5 form-control" name="result-heading" id="" placeholder="Enter Title of Result">
                                                    </div>
                                                    <div class="col">
                                                        <p class="m-b-5 f-w-600 anno">Description</p>
                                                        <input type="text" class="m-b-5 form-control" name="result-desc" id="" placeholder="Enter Description of Result">
                                                    </div>
                                                    <div class="col">
                                                        <p class="m-b-5 f-w-600 anno">Company Name</p>

                                                        <select name="add-comp_id" id="job_id" class="form-control">
                                                            <option value="0">Select Company</option>
                                                            <?php
                                                            $search = $conn->query("SELECT comp_id,comp_name FROM  `company`; ");
                                                            while ($rows = $search->fetch_assoc()) {
                                                                echo "<option value='" . $rows['comp_id'] . "'>" . $rows['comp_name'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <!-- <input type="text" id="drive_id_val" value="" name="abc" hidden />
                                                    <script>
                                                        document.getElementById("comp_idv").onchange = function() {
                                                            document.getElementById("drive_id_val").value = this.value;
                                                        }
                                                    </script> -->
                                                    <div class="col">
                                                        <p class="m-b-5 f-w-600 anno">Role Name</p>
                                                        <select name="add-role_id" id="role_id" class="form-control">

                                                            <option value="0">Select Role</option>
                                                            <?php
                                                            // $search = $conn->query("SELECT role_id,role_name FROM  `drive` where drive_id=''");
                                                            // while ($rows = $search->fetch_assoc()) {
                                                            //     echo "<option value='" . $rows['role_id'] . "'>" . $rows['role_name'] . "</option>";
                                                            // }
                                                            $search = $conn->query("SELECT drive_id,job_role FROM  `drive`");
                                                            while ($rows = $search->fetch_assoc()) {
                                                                echo "<option value='" . $rows['drive_id'] . "'>" . $rows['job_role'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <div class="col">
                                                        <p class="m-b-5 f-w-600 anno">ID Numbers:</p>
                                                    </div>
                                                    <div class="col tabl">
                                                        <form action="./addresult.php" method="post">
                                                            <table id="emptbl">
                                                                <tr>
                                                                    <td id="col0">
                                                                        <input class="form-control" type="text" name="add_ids[]" />
                                                                    </td>
                                                                </tr>
                                                            </table>
                                                            <table>
                                                                <tr>
                                                                    <td><input type="button" value="Add Row" onclick="addRows()" class="text-center btn btn-success m-5" /></td>
                                                                    <td><input type="button" value="Delete Row" onclick="deleteRows()" class="text-center btn btn-danger m-5" /></td>
                                                                    <td><input type="submit" value="Submit" name="add-result" class="text-center btn btn-primary m-5" /></td>
                                                                </tr>
                                                            </table>
                                                        </form>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
        </main>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./helper/sidebar.js"></script>

</body>

</html>