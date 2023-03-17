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
        <title>Add TPC</title>

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
                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Add TPC</h6>
                                            <form action="#" method="post">

                                                <div class="row ">
                                                    <div class="col-sm-6">

                                                        <p class="m-b-5 col f-w-600 ">Enter ID Number</p>
                                                        <input type="text" class=" form-control" name="" id="" value="">
                                                    </div>
                                                    <div class="col-sm-6">

                                                        <input type="submit" value="Search" class="  text-center btn btn-success m-5" />
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tabl">
                                            <form action="#" method="post">
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

                                                        <tr>
                                                            <td id="col0">
                                                                <p class="m-b-5 f-w-600 "> 19CP015</p>

                                                            </td>
                                                            <td id="col1">
                                                                <p class="m-b-5 f-w-600 "> Dhyey Badheka</p>
                                                            </td>
                                                            <td id="col2">
                                                                <p class="m-b-5 f-w-600 "> jimishravat2802@gmail.com</p>

                                                            </td>
                                                            <td id="col3">
                                                                <p class="m-b-5 f-w-600 "> 9876543211</p>

                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <table>
                                                    <tr>
                                                        <td><input type="submit" value="Add TPC" class="text-center btn btn-success m-5" /></td>
                                                        <!-- <td><input type="button" value="Delete Row" onclick="deleteRows()" class="text-center btn btn-danger m-5" /></td> -->
                                                        <!-- <td><input type="submit" value="Submit" class="text-center btn btn-primary m-5" /></td> -->
                                                    </tr>
                                                </table>
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