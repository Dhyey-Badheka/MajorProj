<?php
$reqFor = "regis";
$query = "SELECT *,student_document.photo FROM student,student_document WHERE pemail = '$adminUserEmail' AND oauth_uid='$adminUserAuth' and is_registered='1' and is_approved='1' and student.id_number=student_document.s_id";
$check_result = $conn->query($query);
if ($check_result->num_rows == 1) {
    $row = $check_result->fetch_assoc();
    $name = $row["first_name"] . " " . $row["last_name"];
    $logo = $row["photo"];
}

?>
<!-- <link rel="stylesheet" href="path/to/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css"> -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
<nav>
    <div class="sidebar-top">
        <span class="shrink-btn">
            <i class='bx bx-chevron-left'></i>
        </span>
        <img src="http://localhost/tpc-main/images/logo.png" class="logo" alt="Logo">
        <h3 class="hide">TPC</h3>
    </div>

    <div class="sidebar-links">
        <ul>
            <!-- <div class="active-tab"></div> -->
            <li class="tooltip-element" data-tooltip="0">
                <a href="index.php">
                    <div class="icon">
                        <!-- <box-icon type='solid' name='report' type='solid' color='#FF9600'></box-icon> -->
                        <i class="bi bi-megaphone-fill" style="color: #ff9600" type='solid'></i>
                        <!-- <i class=" fa-sharp fa-solid fa-megaphone" style="color: #ff9600;"></i> -->
                    </div>
                    <span class="link hide si">Announcements</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="1">
                <a href="results.php">
                    <div class="icon">
                        <i class="bi bi-bookmark-star" style="color: #ff9600" type='solid'></i>
                        <!-- <box-icon type='solid' name='bookmark-alt-plus' color='#FF9600'></box-icon> -->
                    </div>
                    <span class="link hide si">Results</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="2">
                <a href="companies.php">
                    <div class="icon">
                        <!-- <i class="bi bi-building-add" style="color: #ff9600" type='solid'></i> -->
                        <i class="bi bi-circle-square" style="color: #ff9600" type='solid'></i>
                        <!-- <box-icon name='buildings' type='solid' color='#FF9600'></box-icon> -->
                    </div>
                    <span class="link hide si">All Drives</span>
                </a>
            </li>

            <div class="tooltip">
                <span>Announcements</span>
                <span>Results</span>
                <span>All Drives</span>
            </div>
        </ul>
    </div>

    <div class="sidebar-links">
        <h4 class="hide">Shortcuts</h4>
        <ul>
            <li class="tooltip-element" data-tooltip="0">
                <a href="drives.php">
                    <div class="icon">
                        <!-- <box-icon type='solid' name='plane-take-off' color='#FF9600'></box-icon> -->
                        <i class="bi bi-check-all" style="color: #ff9600" type='solid'></i>
                    </div>
                    <span class="link hide si">Applied Drives</span>
                </a>
            </li>

            <li class="tooltip-element" data-tooltip="1">
                <a href="resume.php">
                    <div class="icon">
                        <!-- <box-icon name='clipboard' type='solid' color='#FF9600'></box-icon> -->
                        <i class="bi bi-columns" style="color: #ff9600" type='solid'></i>
                    </div>
                    <span class="link hide si">Resume</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="2">
                <a href="updateProfile.php?id=<?php echo $adminUserEmail ?>" data-active="5">
                    <div class="icon">
                        <i class="bi bi-person-check" style="color: #ff9600" type='solid'></i>
                        <!-- <box-icon name='street-view' color='#FF9600' type='solid' color='#FF9600'></box-icon> -->
                    </div>
                    <span class="link hide si">Profile</span>
                </a>
            </li>
            <div class="tooltip">
                <span>Applied Drives</span>
                <span>Resume</span>
                <span>Profile</span>
            </div>
        </ul>
    </div>
    <div class="sidebar-footer">
        <div class="admin-user tooltip-element" data-tooltip="6">
            <div class="admin-profile">
                <?php if ($check_result->num_rows == 1) { ?>
                    <img src="http://localhost/tpc-main/student/uploads/<?php echo $adminUserEmail ?>/<?php echo $logo; ?>" alt="">
                    <div class=" admin-info">
                        <h3><?php echo $name ?></h3>
                    </div>
                <?php } ?>
            </div>
            <a href="../../tpc-main/logout.php" class="log-out">
                <i class='bx bx-log-out'></i>
            </a>
        </div>
        <div class="tooltip">
            <span class="show">Dhyey</span>
            <span>Logout</span>
        </div>
    </div>
</nav>