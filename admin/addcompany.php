<?php

include("../database.php");
include("../helper/authorization.php");
if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}

$addSuccess = 0;
$addFailure = 0;
$name = "";
$url = "";
$hr_name = "";
$hr_phone = "";
$hr_email = "";
$file = "";
$desc = "";
$location = "";

if (isset($_POST["add-comp"])) {
    $name = $_POST["name"];
    $url = $_POST["url"];
    $hr_name = $_POST["hr_name"];
    $hr_phone = $_POST["hr_phone"];
    $hr_email = $_POST["hr_email"];
    $desc = $_POST["desc"];
    $location = $_POST["location"];
    $targetDir = "uploads/" . $name . "/";
    if (!file_exists($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $fileName = basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
    $insert = $conn->query("INSERT INTO `company` (`comp_name`, `company_description`,`location`, `comp_hr_name`, `comp_hr_email`, `comp_hr_mobile`, `comp_url`, `comp_logo`) VALUES
('$name', '$desc', '$location', '$hr_name', '$hr_email', '$hr_phone', '$url', '$fileName');");
    if ($conn->affected_rows) {
        $addSuccess = 1;
    } else {
        $addFailure = 1;
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <?php if ($addSuccess == 1 || $addFailure == 1) : ?>
        <meta http-equiv="refresh" content="2;url=http://localhost/tpc-main/admin/company.php" />
    <?php endif ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/approve.css">
    <title>Add Drive</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>
    <div class="container">
        <main>
            <form action="./addcompany.php" method="POST" enctype="multipart/form-data">
                <div class="page-content page-container" id="page-content">
                    <div class="padding">
                        <div class="row  d-flex justify-content-center">
                            <?php if ($addSuccess == 1) : ?>
                                <p class="bg-success text-white text-center">Successfully Added </p>
                            <?php endif ?>
                            <?php if ($addFailure == 1) : ?>
                                <p class="bg-danger text-white text-center">Error in Adding the Result </p>
                            <?php endif ?>
                            <form action="./addcompany.php" method="post">
                                <div class="container">
                                    <div class="card user-card-full">
                                        <div class="row m-l-0 m-r-0">
                                            <div class="col-sm-4 bg-c-lite-green user-profile">
                                                <div class="card-block text-center text-white">
                                                    <div class="m-b-25">
                                                        <img src="#" id="showLogo" class="img-radius my-5" alt="Company-Logo">
                                                        <input type="file" name="file" id="file" class="inputfile" />
                                                        <label for="file">Upload Logo</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="card-block">
                                                    <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Company Information</h6>
                                                    <div class="row m-b-20">
                                                        <div class="col-sm-6 ">
                                                            <p class="m-b-5 f-w-600">Company Name</p>
                                                            <input type="text" class="m-b-5 form-control" name="name" id="" placeholder="Company's Name">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="m-b-5 f-w-600">Company URL</p>
                                                            <input type="text" class="m-b-5 form-control" name="url" id="" placeholder="Company's Website URL">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="m-b-5 f-w-600">Company Location</p>
                                                            <input type="text" class="m-b-5 form-control" name="location" id="" placeholder="Company's Location">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="m-b-5 f-w-600">HR Name</p>
                                                            <input type="text" class="m-b-5 form-control" name="hr_name" id="" placeholder="Company's HR Name">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="m-b-5 f-w-600">HR Phone</p>
                                                            <input type="number" class="m-b-5 form-control" name="hr_phone" id="" placeholder="Company's HR Number">
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <p class="m-b-5 f-w-600">HR Email</p>
                                                            <input type="email" class="m-b-5 form-control" name="hr_email" id="" placeholder="Company's HR EMail">
                                                        </div>
                                                        <div class="col-sm-20">
                                                            <p class="m-b-5 f-w-600">Company Description</p>
                                                            <textarea class="m-b-5 form-control" name="desc" id="">Company Description</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <td><input type="submit" value="Submit" name="add-comp" class="text-center btn btn-primary m-5" /></td>
                            </form>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </div>
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