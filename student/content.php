<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style type="text/css">
        .title {
            text-size: 30px;
            padding-top: 10px;
            padding-left: 10px;
            padding-right: 10px;
            color: black;
            text-align: center;
        }

        .container {
            text-align: center;
        }

        hr {
            border-top: 0.5px solid;
            margin-top: -2.5px;
        }

        .education {
            line-height: 2.5px;
        }

        .skills {
            line-height: 2.5px;
        }

        .certifications {
            line-height: 2.5px;
        }

        #tech {
            padding-right: 220px;
        }

        #ntech {
            padding-right: 190px;
        }

        /* .internship {
            line-height: 5px;
        } */
    </style>
    <?php
    include("../database.php");
    if (isset($_GET["id"])) {
        $email = isset($_GET["id"]) ? $_GET["id"] : $_POST["pemail"];
        // $email = "19it450@bvmengineering.ac.in";
        $search = $conn->query("SELECT * FROM student,student_document,student_academic WHERE student.pemail='$email' and student.pemail=student_document.s_email and student.pemail=student_academic.s_email");
        if ($search->num_rows == 1) {
            $row = $search->fetch_assoc();
            $id_number = $row["id_number"];
            $department = $row["dept_id"];
            $isApproved = $row["is_approved"];
            $fname = $row["first_name"];
            $lname = $row["last_name"];
            $mname = $row["middle_name"];
            $mobile = $row["mobile"];
            $semail = $row["semail"];
            $gender = $row["gender"];
            $linkedin_url = $row["linkedinurl"];
            $dob = $row["dob"];
            $enro = $row["enrolno"];
            $category = $row["category"];
            $pgoal = $row["isinterestedforplacement"];
            $pplotno = $row["paddressline1"];
            $pcity = $row["paddresslcity"];
            $ppin = $row["paddresslpin"];
            $pdistrict = $row["paddressldis"];
            $pstate = $row["paddresslstate"];
            $pcountry = $row["paddresslcountry"];
            $splotno = $row["tpaddressline1"];
            $scity = $row["paddresslcity"];
            $spin = $row["paddresslpin"];
            $sdistrict = $row["paddressldis"];
            $sstate = $row["paddresslstate"];
            $scountry = $row["paddresslcountry"];
            $py = $row["bvm_passing_year"];
            $spy = $row["ssc_passing_year"];
            $sp = $row["ssc_th_percentage"];
            $spo6 = $row["ssc_total"];
            $sboard = $row["ssc_board"];
            $ssname = $row["ssc_school"];
            $sedug = $row["ssc_educational_gap"];
            $isdiploma = $row["isd2d"];
            $hpy = $row["hsc_passing_year"];
            $hppt = $row["hsc_th_p_percentage"];
            $hpt = $row["hsc_th_percentage"];
            $hboard = $row["hsc_board"];
            $hto5 = $row["hsc_th_marks"];
            $hmtp6 = $row["hsc_th_p_marks"];
            $heg = $row["hsc_educational_gap"];
            $hsname = $row["hsc_school"];
            $dpy = $row["d2d_passing_year"];
            $dcgpa = $row["d2d_cgpa"];
            $dcn = $row["d2d_college"];
            $dvms1 = $row["d2d_sem1"];
            $dvms2 = $row["d2d_sem2"];
            $dvms3 = $row["d2d_sem3"];
            $dvms4 = $row["d2d_sem4"];
            $dvms5 = $row["d2d_sem5"];
            $dvms6 = $row["d2d_sem6"];
            $dtbl = $row["d2d_backlogs"];
            $degp = $row["d2d_educational_gap"];
            $bvms1 = $row["bvm_sem1"];
            $bvms2 = $row["bvm_sem2"];
            $bvms3 = $row["bvm_sem3"];
            $bvms4 = $row["bvm_sem4"];
            $bvms5 = $row["bvm_sem5"];
            $bvms6 = $row["bvm_sem6"];
            $bvms7 = $row["bvm_sem7"];
            $bvms8 = $row["bvm_sem8"];
            $bccpi = $row["bvm_cpi"];
            $babl = $row["bvm_active_backlog"];
            $bcbl = $row["bvm_dead_backlog"];
            $btbl = $row["bvm_total_backlog"];
        }
    }
    ?>

</head>

<body>
    <h1 class="title"><?php echo $fname . " " . $lname; ?></h1>
    <hr>
    <div class="container"><?php
                            echo $pplotno . ", " . $pdistrict . "-" . $pstate . "<br>";
                            echo $mobile . "<br>";
                            echo $semail . "<br>";
                            ?></div>
    <hr>
    <div class="container">
        <p>Self-motivated, highly passionate, and hardworking fresher looking for an opportunity to work in a challenging organization to utilize my skills and knowledge to work for the growth of the organisation.</p>
    </div>
    <hr>
    <div class="education">
        <h3>EDUCATION</h3>
        <p style="text-decoration: underline;">
            SSC
        </p>
        <p>
            <?php
            echo $ssname . " - " . $sboard;
            ?>
        </p>
        <p>Percentage:
            <?php
            echo $sp;
            ?>
        </p>
        <p style="text-decoration: underline;">
            <?php
            if ($isdiploma == "1") {
                echo "Diploma";
            } else { {
                    echo "HSC";
                }
            }
            ?>
        </p>
        <p>
            <?php
            if ($isdiploma == "1") {
                echo $dcn;
            } else {
                echo $hsname . " - " . $hboard;
            }
            ?>
        </p>
        <p>
            <?php
            if ($isdiploma == "1") {
                echo "CPI: " . $dcgpa;
            } else {
                echo "Percentage: " . $hppt;
            }
            ?>
        </p>
        <p style="text-decoration: underline;">
            Graduation
        </p>
        <p>
            Birla Vishvakarma Mahavidyalaya
        </p>
        <p>
            <?php
            echo $bccpi;
            ?>
        </p>
    </div>

    <hr>
    <div class="internship">
        <h3>Internship Experience</h3>
        <h4>
            BrainyBeams Technology Pvt. Ltd.
        </h4>
        Collaborated in a cross-functional team of 5 interns (incl. software engineers and program manager) on an online resume builder.
        Defined the design and UX to delight the user and deliver functionality in an elegant and efficient manner.
        <h5>Key achievement:
        </h5>
        Delivered the MVP version of the resume builder after 14 weeks of collaboration.
        <hr>
    </div>
    <div class="skills">
        <h3>Skills</h3>
        <h5>
            Hard Skills
        </h5>
        <table>
            <tr>
                <td id="tech">
                    Java
                </td>
                <td id="tech">
                    Python
                </td>
                <td id="tech">
                    C/C++
                </td>
            </tr>
            <tr>
                <td id="tech">
                    HTML/CSS
                </td>
                <td id="tech">
                    React JS
                </td>
                <td id="tech">
                    Express JS
                </td>
            </tr>
        </table>
        <h5>
            Soft Skills
        </h5>
        <table>
            <tr>
                <td id="ntech">
                    Problem Solving
                </td>
                <td id="ntech">
                    Critical Thinking
                </td>
                <td id="ntech">
                    Flexibility
                </td>
            </tr>
            <tr>
                <td id="ntech">
                    Communication
                </td>
                <td id="ntech">
                    Teamwork
                </td>
                <td id="ntech">
                    Creativity
                </td>
            </tr>
        </table>
        <hr>
    </div>
    <div class="certifications">
        <h3>Certifications</h3>
        <table style="margin-top:5px">
            <ol>
                <tr>
                    <li>AWS Cloud by GDSC Student Club</li>
                </tr>
                <tr>
                    <li>UI/UX by GFG Student Club</li>
                </tr>
                <tr>
                    <li>Machine Learning by Udemy</li>
                </tr>
                <tr>
                    <li>Python Core by SoloLearn</li>
                </tr>
            </ol>
        </table>
    </div>
</body>

</html>