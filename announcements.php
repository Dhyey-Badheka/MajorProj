<?php

include("./database.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("./core/header.php")    ?>
    <link rel="stylesheet" href="./css/announcements.css">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <link href="img/logo.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">
    <!-- < !-- Vendor CSS Files -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/css/variables.css" rel="stylesheet">
    <link href="assets/css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="css/AdminLTE.min.css">
    <link rel="stylesheet" href="css/_all-skins.min.css">
    <title>Announcements</title>
    <link rel="stylesheet" href="assets/css/chat.css">
</head>

<body>
    <?php require_once("./core/nav.php") ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/student/helper/index.js"></script>
    <main>
        <section class="column-list pr-lg-1 " id="one-column-list">
            <!-- <div class="container"> -->
            <div class="row">
                <div class="col-lg-12">
                    <section aria-label="Announcements" class="announcements">
                        <h2 class="font-weight-bold border-bottom pb-3 mt-1 mb-0 ">Announcements</h2>
                        <div class="announcement-slider border-r-xs-0 border-r position-relative">
                            <div>
                                <?php
                                $search = $conn->query("SELECT * FROM  `announcement`  ORDER BY posted_on DESC");
                                while ($row = $search->fetch_assoc()) {
                                ?>
                                    <ul class="nolist list-unstyled position-relative mb-0 px-lg-5">
                                        <li class="border-bottom pb-3 mt-3">
                                            <span class="meta text-uppercase"><?php echo $row["posted_on"] ?></span>
                                            <h3 class="font-weight-bold mt-0">
                                                <?php echo $row["title"] ?>
                                            </h3>
                                            <p class="m-0 post_intro bl"></p> <?php echo $row["description"] ?> </p>
                                        </li>

                                    </ul>
                                <?php } ?>
                            </div>

                        </div>
                    </section>
                </div>
        </section>
        </div>
        </div>
        </div>
        </section>

    </main>

    <?php require_once("./core/footer.php") ?>
</body>

</html>