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
                        <box-icon type='solid' name='report' type='solid' color='#FF9600'></box-icon>
                    </div>
                    <span class="link hide si">Announcements</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="1">
                <a href="results.php">
                    <div class="icon">
                        <box-icon type='solid' name='book-bookmark' type='solid' color='#FF9600'></box-icon>
                    </div>
                    <span class="link hide si">Results</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="2">
                <a href="companies.php">
                    <div class="icon">
                        <box-icon name='buildings' type='solid' color='#FF9600'></box-icon>
                    </div>
                    <span class="link hide si">All Drives</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="3">
                <a href="drives.php">
                    <div class="icon">
                        <box-icon type='solid' name='plane-take-off' color='#FF9600'></box-icon>
                    </div>
                    <span class="link hide si">Applied Drives</span>
                </a>
            </li>
            <div class="tooltip">
                <span>Announcements</span>
                <span>Results</span>
                <span>All Drives</span>
                <span>Applied Drives</span>
            </div>
        </ul>
        <h4 class="hide">Shortcuts</h4>
        <ul>
            <li class="tooltip-element" data-tooltip="0">
                <a href="resume.php" data-active="4">
                    <div class="icon">
                        <box-icon name='clipboard' type='solid' color='#FF9600'></box-icon>
                    </div>
                    <span class="link hide si">Resume</span>
                </a>
            </li>
            <li class="tooltip-element" data-tooltip="1">
                <a href="updateProfile.php?id=<?php echo $adminUserEmail ?>" data-active="5">
                    <div class="icon">
                        <box-icon name='street-view' color='#FF9600' type='solid' color='#FF9600'></box-icon>
                    </div>
                    <span class="link hide si">Profile</span>
                </a>
            </li>

            <div class="tooltip">
                <span class="show">Resume</span>
                <span>Profile</span>
            </div>
        </ul>
    </div>
    <div class="sidebar-footer">
        <!-- <a href="#" class="account tooltip-element" data-tooltip="0">
            <i class='bx bx-user'></i>
        </a> -->
        <div class="admin-user tooltip-element" data-tooltip="1">
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