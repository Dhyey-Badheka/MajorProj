<?php

include("../database.php");
include("../helper/authorization.php");

if ($access == 2 || $access == 3) {
    $dept = $_SESSION["adminDept"];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./helper/announcements.css">
    <link rel="stylesheet" href="./helper/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

    <title>Students</title>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/student/helper/index.js"></script>
    <?php include("./helper/sidebar.php") ?>
    <main>
        <h1>Welcome TPO,</h1>


        <section class="column-list mb-sm-2 pr-lg-1 container-fluid" id="two-column-list">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 pr-0">
                        <section aria-label="Announcements" class="announcements">
                            <!-- <?php if ($access == 1) : ?>
                                <a href="addresult.php"> <button type="button" class="btn btn-primary" style="float:right">Add</button></a>
                            <?php endif ?> -->
                            <h2 class="font-weight-bold border-bottom pb-3 mt-3 mb-0 pr-5">Results</h2>

                            <div class="announcement-slider border-r-xs-0 border-r position-relative">
                                <div>
                                    <?php
                                    $search = $conn->query("SELECT * FROM  `result`");

                                    while ($row = $search->fetch_assoc()) {
                                    ?>
                                        <ul class="nolist list-unstyled position-relative mb-0 px-lg-5 pt-lg-5">
                                            <li class="border-bottom pb-3 mt-3">
                                                <span class="meta text-uppercase"><?php echo $row["posted_on"] ?></span>
                                                <div style="float:right;" class="mt-5">
                                                    <a href="viewresult.php?ViewId=<?php echo $row["drive_id"]; ?>"><button type="button" class="btn btn-success float-right">View</button></a>
                                                    <?php if ($access == 1) : ?>
                                                        <a href="updateresult.php?updateId=<?php echo $row["drive_id"]; ?>"><button type="button" class="btn btn-warning float-right">Update</button></a>
                                                        <a href="updateresult.php?deleteId=<?php echo $row["drive_id"]; ?>"><button type="button" class="btn btn-danger float-right">Delete</button></a>
                                                        <!-- <button type="button" class="btn btn-danger float-right">Delete</button> -->
                                                    <?php endif ?>
                                                </div>
                                                <h3 class="font-weight-bold mt-0">
                                                    <?php echo $row["heading"] ?>
                                                </h3>
                                                <p class="m-0 post_intro bl"> <?php echo $row["description"] ?> </p>
                                            </li>

                                        </ul>
                                    <?php } ?>
                                    <!-- <a class="all pos-stat text-uppercase ml-lg-5" href="#">All announcements
                                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                                    </a> -->

                                </div>

                            </div>
                        </section>
                    </div>
                    <div class="col-lg-6 pl-0">
                    </div>
        </section>
        </div>
        </div>
        </div>
        </section>



        <p class="copyright">
            &copy; 2023 - <span>Dhyey Badheka</span> All Rights Reserved.
        </p>
    </main>

    <script src="./helper/sidebar.js"></script>
</body>

</html>