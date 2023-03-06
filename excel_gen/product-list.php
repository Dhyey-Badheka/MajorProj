<?php

namespace Phppot;

use Phppot\Product;

require_once __DIR__ . '/class/Product.php';
$product = new Product();

if (isset($_POST["export"])) {
    $product->exportProductDatabase($productResults);
}
?>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="./style.css" type="text/css" rel="stylesheet" />
</head>

<body>
    <div id="table-container">
        <?php
        if (!empty($productResults)) {
        ?>
            <table id="tab">
                <tr>
                    <th width="20%">
                        <img src="http://localhost/tpc-main/images/logo.png" width="200" height="200" />
                    </th>
                    <th style="color:#1d3d78">
                        <h1>Birla Vishvakarma Mahavidyalaya</h1>
                        <h2>An Autonomous Instituition</h2>
                        <h3>Vallabh Vidyanagar,Anand-388120</h3>
                    </th>
                </tr>
            </table>
            <table id="tab">
                <thead>
                    <tr>
                        <th width="10%">Sr. No.</th>
                        <th width="15%">Student ID</th>
                        <th width="25%">Student Name</th>
                        <th width="10%">Department</th>
                        <th width="10%">Salary</th>
                        <th width="25%">Company</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($productResults as $key => $value) {
                    ?>
                        <tr>
                            <td><?php echo $productResults[$key]["srid"]; ?></td>
                            <td><?php echo $productResults[$key]["stuid"]; ?></td>
                            <td><?php echo $productResults[$key]["Name"]; ?></td>
                            <td><?php echo $productResults[$key]["dept"]; ?></td>
                            <td><?php echo $productResults[$key]["salary"]; ?></td>
                            <td><?php echo $productResults[$key]["company"]; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

            <div class="btn">
                <form action="" method="post">
                    <button type="submit" id="btnExport" name='export' value="Export to Excel" class="btn btn-info">Export to Excel</button>
                </form>
            </div>
        <?php
        } else {
        ?>
            <div class="empty-table">
                <div class="svg-icon">
                    <svg xmlns="http://localhost/tpc-main/images/logo.png" width="48" height="48" viewBox="0 0 24 24">
                        <circle cx="12" cy="19" r="2" />
                        <path d="M10 3h4v12h-4z" />
                        <path fill="none" d="M0 0h24v24H0z" />
                    </svg>
                </div>
                No records found
            </div>
        <?php
        }
        ?>
    </div>
</body>

</html>