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
    <link rel="stylesheet" href="./helper/addresult.css">
    <link rel="stylesheet" href="./helper/sidebar.css">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/3.6.95/css/materialdesignicons.css">
    <link rel="stylesheet" href="./helper/viewStudent.css">
    <title>Add TPF</title>

</head>

<body>
    <?php include("./helper/sidebar.php") ?>

    <div class="container">
        <main>

            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row d-flex justify-content-center">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Add TPF</h6>
                                        <form action="#" method="post">

                                            <div class="row ">
                                                <div class="col-sm-4">

                                                    <p class="m-b-5 col f-w-600 ">First Name</p>
                                                    <input type="text" class=" form-control" name="" id="" value="" autocomplete="off" autofocus>
                                                </div>
                                                <div class="col-sm-4">

                                                    <p class="m-b-5 col f-w-600 ">Last Name</p>
                                                    <input type="text" class=" form-control" name="" id="" value="">
                                                </div>
                                                <div class="col-sm-4">

                                                    <p class="m-b-5 col f-w-600 ">Email</p>
                                                    <input type="text" class=" form-control" name="" id="" value="">
                                                </div>
                                                <div class="col-sm-4">

                                                    <p class="m-b-5 col f-w-600 ">Mobile</p>
                                                    <input type="text" class=" form-control" name="" id="" value="">
                                                </div>
                                                <div class="col-sm-4">

                                                    <p class="m-b-5 col f-w-600 ">Department</p>
                                                    <!-- <input type="text" class=" form-control" name="" id="" value=""> -->
                                                    <!-- <span class="details">Department</span> -->
                                                    <select name="department" id="dept" class="form-control" required>
                                                        <option value="0">Select Your Department</option>
                                                        <?php
                                                        $dept = "SELECT * FROM department";
                                                        $result = mysqli_query($conn, $dept);
                                                        while ($row = $result->fetch_assoc()) {
                                                        ?>
                                                            <option value="<?php echo $row["dept_id"] ?>"><?php echo $row["dept_name"] ?></option>
                                                        <?php

                                                        }

                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">

                                                    <p class="m-b-5 col f-w-600 ">Academic Year</p>
                                                    <input type="text" maxlength="4" size="4" class=" form-control" name="" id="" value="">
                                                </div>
                                                <div class="col-sm-12">

                                                    <input type="submit" value="Add TPF" class="  text-center btn btn-success m-5" />
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
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