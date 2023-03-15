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
    <title>Add Result</title>
    <script type="text/javascript">
        function addRows() {
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            var cellCount = table.rows[0].cells.length;
            var row = table.insertRow(rowCount);
            for (var i = 0; i <= cellCount; i++) {
                var cell = 'cell' + i;
                cell = row.insertCell(i);
                var copycel = document.getElementById('col' + i).innerHTML;
                cell.innerHTML = copycel;
                // if (i == 3) {
                //     var radioinput = document.getElementById('col3').getElementsByTagName('input');
                //     for (var j = 0; j <= radioinput.length; j++) {
                //         if (radioinput[j].type == 'radio') {
                //             var rownum = rowCount;
                //             radioinput[j].name = 'gender[' + rownum + ']';
                //         }
                //     }
                // }
            }
        }

        function deleteRows() {
            var table = document.getElementById('emptbl');
            var rowCount = table.rows.length;
            if (rowCount > '2') {
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
                    <div class="row d-flex justify-content-center">
                        <div class="card user-card-full">
                            <div class="row m-l-0 m-r-0">
                                <div class="col">
                                    <div class="card-block">
                                        <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Post A Result</h6>
                                        <div class="col">
                                            <p class="m-b-5 f-w-600 anno">Enter Company Name</p>
                                            <input type="text" class="m-b-5 form-control" name="" id="" value="">
                                        </div>
                                    </div>
                                    <div class="tabl">
                                        <form action="#" method="post">
                                            <table id="emptbl">
                                                <tr>
                                                    <th>Department</th>
                                                    <th>ID</th>
                                                    <th>Salary</th>
                                                    <th>Job Role</th>
                                                </tr>
                                                <tr>
                                                    <td id="col0">
                                                        <select name="department[]" id="dept" class="form-control">
                                                            <option value="0">Select Department</option>
                                                            <option value="1">CP</option>
                                                            <option value="2">IT</option>
                                                            <option value="3">ME</option>
                                                            <option value="4">CE</option>
                                                            <option value="5">EE</option>
                                                            <option value="6">EL</option>
                                                            <option value="7">EC</option>
                                                            <option value="8">PE</option>
                                                        </select>
                                                    </td>
                                                    <td id="col1">
                                                        <input class="form-control" type="text" name="idn[]" value="" />
                                                    </td>
                                                    <td id="col2"><input type="number" name="sal[]" class="form-control" value="" /></td>
                                                    <td id="col3">
                                                        <input type="text" name="jr[]" class="form-control" value="" />
                                                    </td>
                                                </tr>
                                            </table>
                                            <table>
                                                <tr>
                                                    <td><input type="button" value="Add Row" onclick="addRows()" class="text-center btn btn-success m-5" /></td>
                                                    <td><input type="button" value="Delete Row" onclick="deleteRows()" class="text-center btn btn-danger m-5" /></td>
                                                    <td><input type="submit" value="Submit" class="text-center btn btn-primary m-5" /></td>
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