<?php

include("../database.php");
include("../helper/authorization.php");

if ($access > 2) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}
if ($access == 2 || $access == 3) {
    $dept = $_SESSION["adminDept"];
}

$foundTpc = 0;
$regisTpcSuccess = 0;
$regisTpcError = 0;
$alreadyRegis = 0;
$studentRegis = 1;
$id = "";
$pass = "Tpc@1234";

if (isset($_POST["searchTpc"])) {
    $id = $_POST["stdId"];

    $checkRegis = $conn->query("SELECT * FROM tpc WHERE tpc_id='$id'");

    $checkStudent = $conn->query("SELECT * FROM student WHERE id_number='$id'");
    if ($checkStudent->num_rows) {

        if ($checkRegis->num_rows) {
            $alreadyRegis = 1;
        } else {
            $foundTpc = 1;
        }
    } else {
        $studentRegis = 0;
    }
}
// var_dump($studentRegis, $foundTpc);

if (isset($_POST["addTpc"])) {
    $id = $_POST["id"];
    $email = $_POST["email"];
    $oauth_uid = $_POST["oauth_uid"];
    // $password = base64_encode(strrev(md5($pass)));
    $dept = $_POST["dept"];
    $acaYear = $_POST["acaYear"];
    $mobile = $_POST["mobile"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $name = $fname . ' ' . $lname;
    // var_dump($password);
    // var_dump($_POST);
    $query = "INSERT INTO `tpc`(`tpc_id`, `oauth_uid`, `tpc_name`, `tpc_email`,  `tpc_mobile`, `tpc_dept_id`, `tpc_is_approved`, `academic_year`, `isActive`) VALUES ('$id','$oauth_uid','$name','$email','$mobile','$dept','1','$acaYear','1')";
    // echo $query;
    $insert = $conn->query($query);
    if ($conn->affected_rows) {
        $regisTpcSuccess = 1;
    } else {
        $regisTpcError = 1;
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/addresult.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <?php if ($regisTpcError == 1 || $alreadyRegis == 1 || $studentRegis == 0) : ?>
        <meta http-equiv="refresh" content="3;url=http://localhost/tpc-main/admin/addTpc.php" />
    <?php endif ?>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>Add TPC</title>

</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row d-flex justify-content-center">
                        <?php if ($regisTpcSuccess == 1) : ?>
                            <p class="bg-success text-white text-center">Successfully Added TPC </p>
                        <?php endif ?>
                        <?php if ($regisTpcError == 1) : ?>
                            <p class="bg-danger text-white text-center">Error in Adding TPC </p>
                        <?php endif ?>
                        <?php if ($studentRegis == 0) : ?>
                            <p class="bg-danger text-white text-center">Student Not Registered </p>
                        <?php endif ?>
                        <?php if ($alreadyRegis == 1) : ?>
                            <p class="bg-danger text-white text-center">TPC Already Registered </p>
                        <?php endif ?>

                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Add TPC</h6>
                                        <form action="./addTpc.php" method="post">
                                            <div class="row ">
                                                <div class="col-sm-6">
                                                    <p class="m-b-5 col f-w-600 ">Enter ID Number</p>
                                                    <input type="text" class=" form-control" name="stdId" id="" value="">
                                                </div>
                                                <div class="col-sm-6">
                                                    <input type="submit" value="Search" name="searchTpc" class="  text-center btn btn-success m-5" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tabl">
                                        <form action="./addTpc.php" method="post">
                                            <table id="emptbl" class="table">
                                                <thead>

                                                    <tr>
                                                        <th scope="col">ID</th>
                                                        <th scope="col">Name</th>
                                                        <th scope="col">E-Mail</th>
                                                        <th scope="col">Mobile</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if ($foundTpc == 1 && $studentRegis == 1) :
                                                        $tpc = $conn->query("SELECT * FROM student WHERE id_number = '$id'");
                                                        $row = $tpc->fetch_assoc();

                                                    ?>
                                                        <tr>
                                                            <td id="col0">
                                                                <p class="m-b-5 f-w-600 "> <?php echo strtoupper($row["id_number"]) ?></p>

                                                            </td>
                                                            <td id="col1">
                                                                <p class="m-b-5 f-w-600 "> <?php echo $row["first_name"] . " " . $row["last_name"] ?></p>
                                                            </td>
                                                            <td id="col2">
                                                                <p class="m-b-5 f-w-600 "> <?php echo $row["pemail"] ?></p>

                                                            </td>
                                                            <td id="col3">
                                                                <p class="m-b-5 f-w-600 "> <?php echo $row["mobile"] ?></p>

                                                            </td>
                                                        </tr>
                                                </tbody>
                                            </table>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <input type="text" hidden name="id" value="<?php echo $id ?>">
                                                        <input type="text" hidden name="fname" value="<?php echo $row["first_name"] ?>">
                                                        <input type="text" hidden name="lname" value="<?php echo $row["last_name"] ?>">
                                                        <input type="text" hidden name="email" value="<?php echo $row["pemail"] ?>">
                                                        <input type="text" hidden name="oauth_uid" value="<?php echo $row["oauth_uid"] ?>">
                                                        <input type="text" hidden name="mobile" value="<?php echo $row["mobile"] ?>">
                                                        <input type="text" hidden name="dept" value="<?php echo $row["dept_id"] ?>">
                                                        <input type="text" hidden name="acaYear" value="<?php echo $row["bvm_passing_year"] ?>">
                                                        <input type="submit" value="Add TPC" name="addTpc" class="text-center btn btn-success m-5" />
                                                    </td>
                                                    <!-- <td><input type="button" value="Delete Row" onclick="deleteRows()" class="text-center btn btn-danger m-5" /></td> -->
                                                    <!-- <td><input type="submit" value="Submit" class="text-center btn btn-primary m-5" /></td> -->
                                                </tr>
                                            <?php endif ?>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php if ($regisTpcSuccess) : ?>
                            <div class="row d-flex flex-column">
                                <p class="m-b-5 col f-w-600">UserName : <span class="text-muted"><?php echo $email ?></span></p>
                                <p class="m-b-5 col f-w-600">Password : <span class="text-muted"><?php echo $pass ?></span></p>
                            </div>
                        <?php endif ?>
                    </div>
                    <!-- <button class="text-center btn btn-primary">Add </button> -->
                </div>
            </div>
        </main>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./helper/sidebar.js"></script>

</body>

</html>