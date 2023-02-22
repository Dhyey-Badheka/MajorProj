<?php

include("../database.php");

// $id_number = $_GET["id"];





?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/sidebar.css">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/index.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>Add Announcement</title>
</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row  d-flex justify-content-center">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Add An Announcement</h6>
                                        <div class="col">
                                            <p class="m-b-5 f-w-600 anno">Heading</p>
                                            <input type="text" class="m-b-5 form-control" name="" id="" value="">
                                        </div>
                                        <div class="col">
                                            <p class="m-b-5 f-w-600 anno">Description</p>
                                            <input type="text" class="m-b-5 form-control" name="" id="" value="">
                                        </div>
                                        <div class="col">
                                            <p class="m-b-5 f-w-600 anno">Date</p>
                                            <input type="date" class="m-b-5 form-control" name="" id="" value="">
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