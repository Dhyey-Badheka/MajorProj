<?php

include("../database.php");
include("../helper/authorization.php");
if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}

$updateSuccess = 0;
$updateFailure = 0;
$name = "";
$desc = "";
$id = "";
$location = "";
$comp_hr_name = "";
$comp_hr_email = "";
$comp_hr_mobile = "";
$comp_url = "";
$comp_logo = "";
$fileName = "";
$active = "";

if (isset($_GET["deleteId"])) {
    $id = $_GET["deleteId"];
    $delete = $conn->query("DELETE FROM company WHERE comp_id = '$id'");
    if ($conn->affected_rows) {
        echo "<script> window.location.href = 'http://localhost/tpc-main/admin/company.php'; </script>";
    }
}

if (isset($_GET["updateId"]) || isset($_POST["id"])) {
    $id = isset($_GET["updateId"]) ? $_GET["updateId"] : $_POST["id"];
    $search = $conn->query("SELECT * FROM company WHERE comp_id = '$id'");
    if ($search->num_rows == 1) {
        $row = $search->fetch_assoc();
        $name = $row["comp_name"];
        $desc = $row["company_description"];
        $location = $row["location"];
        $comp_hr_name = $row["comp_hr_name"];
        $comp_hr_email = $row["comp_hr_email"];
        $comp_hr_mobile = $row["comp_hr_mobile"];
        $comp_url = $row["comp_url"];
        $comp_logo = $row["comp_logo"];
        $active = $row["active"];
    }
}
if (isset($_POST["update-company"])) {
    $id = $_POST["id"];
    $name = $_POST["comp_name"];
    $desc = $_POST["comp_description"];
    $location = $_POST["location"];
    $comp_hr_name = $_POST["comp_hr_name"];
    $comp_hr_email = $_POST["comp_hr_email"];
    $comp_hr_mobile = $_POST["comp_hr_mobile"];
    $comp_url = $_POST["comp_url"];
    $active = $_POST["active"];
    $targetDir = "uploads/" . $name . "/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    $query = "UPDATE company SET company_description='$desc', location='$location', comp_hr_name='$comp_hr_name', comp_hr_email='$comp_hr_email', comp_hr_mobile='$comp_hr_mobile',comp_url='$comp_url',comp_logo='$fileName' WHERE comp_id = '$id'";
    // echo $query;
    $update = $conn->query($query);
    if ($conn->affected_rows) {
        $updateSuccess = 1;
    } else {
        $updateFailure = 1;
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if ($updateSuccess == 1 || $updateFailure == 1) : ?>
        <meta http-equiv="refresh" content="2;url=http://localhost/tpc-main/admin/company.php" />
    <?php endif ?>
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>Update Company</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row d-flex justify-content-center">
                        <?php if ($updateSuccess == 1) : ?>
                            <p class="bg-success text-white text-center">Successfully Updated </p>
                        <?php endif ?>
                        <?php if ($updateFailure == 1) : ?>
                            <p class="bg-danger text-white text-center">Error in Updating the Company </p>
                        <?php endif ?>
                        <form action="./updateCompany.php" method="post" enctype="multipart/form-data">
                            <div class="card user-card-full">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col">
                                        <div class="card-block">
                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Update Company</h6>
                                            <form action="./updateCompany.php" method="post" enctype="multipart/form-data">
                                                <input type="text" name="id" value="<?php echo $id ?>" hidden>
                                                <input type="text" name="active" value="<?php echo $active ?>" hidden>
                                                <div class="card user-card-full">
                                                    <div class="row m-l-0 m-r-0">
                                                        <div class="col-sm-4 bg-c-lite-green user-profile">
                                                            <div class="card-block text-center text-white">
                                                                <div class="m-b-25">
                                                                    <img id="showLogo" src='http://localhost/tpc-main/admin/uploads/<?php echo $comp_logo ?>' class="img-radius" alt="User-Profile-Image" />
                                                                    <input type="file" name="file" id="file" class="inputfile" />
                                                                    <label for="file">Upload Logo</label>
                                                                </div>
                                                                <p>
                                                                    <span class="badge text-white badge-lg badge-dot">
                                                                        <?php if ($active == 0) {
                                                                            echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-warning'></i>Pending
                                </span>";
                                                                        } else if ($active == 1) {
                                                                            echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-success'></i>Approved
                                </span>";
                                                                        } else if ($active == 2) {
                                                                            echo "<span class='badge badge-lg badge-dot'>
                                    <i class='bg-danger'></i>Rejected
                                </span>";
                                                                        }
                                                                        ?>
                                                                    </span>
                                                                <p><?php echo $name ?></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-8">
                                                            <div class="card-block">
                                                                <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Company Information</h6>
                                                                <div class="row m-b-20">
                                                                    <div class="col-sm-6 ">
                                                                        <p class="m-b-5 f-w-600">Company Name</p>
                                                                        <input type="text" class="form-control" name="comp_name" id="" value=<?php echo $name ?>>

                                                                    </div>

                                                                    <div class="col-sm-6">
                                                                        <p class="m-b-5 f-w-600">Location</p>
                                                                        <input type="text" class="form-control" name="location" id="" value=<?php echo $location ?>>
                                                                    </div>
                                                                    <div class="row m-b-20">
                                                                        <div class="col-sm-12">
                                                                            <p class="m-b-5 f-w-600">URL</p>
                                                                            <input type="text" class="form-control" name="comp_url" id="" value=<?php echo $comp_url ?>>
                                                                        </div>
                                                                        <div class="row m-b-20">
                                                                            <div class="col">
                                                                                <p class="m-b-5 f-w-600 anno">Description</p>
                                                                                <textarea class="m-b-5 form-control" name="comp_description" id=""><?php echo $desc ?></textarea>
                                                                            </div>
                                                                        </div>
                                                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">HR Information</h6>
                                                                        <div class="row m-b-20">
                                                                            <div class="col-sm-6 ">
                                                                                <p class="m-b-5 f-w-600">HR Name</p>
                                                                                <input type="text" class="form-control" name="comp_hr_name" id="" value=<?php echo $comp_hr_name ?>>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <p class="m-b-5 f-w-600">HR Email</p>
                                                                                <input type="email" class="form-control" name="comp_hr_email" id="" value=<?php echo $comp_hr_email ?>>
                                                                            </div>
                                                                            <div class="col-sm-6">
                                                                                <p class="m-b-5 f-w-600">HR Mobile</p>
                                                                                <input type="number" minlength="10" maxlength="10" class="form-control" name="comp_hr_mobile" id="" value=<?php echo $comp_hr_mobile ?>>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="submit" value="Update" name="update-company" class="text-center btn btn-primary">
                                                    </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="./helper/sidebar.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="./helper/sidebar.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
        <script>
            function imagePreview(fileInput) {
                if (fileInput.files && fileInput.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#showLogo').attr('src', e.target.result);
                    }
                    reader.readAsDataURL(fileInput.files[0]);
                }
            }

            $("#file").change(function() {
                imagePreview(this);
            });
        </script>
</body>

</html>