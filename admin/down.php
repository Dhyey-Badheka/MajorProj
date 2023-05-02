<?php
include("../database.php");
include("../helper/authorization.php");

if ($access != 1) {
    echo "<script> window.location.href = 'http://localhost/tpc-main/helper/noAccess.php'; </script>";
}
$sql_normal = "SELECT ROW_NUMBER() OVER (ORDER BY  id_number),id_number,first_name,middle_name,last_name,gender,mobile,pemail,semail,dept_id,linkedinurl,dob,enrolno,category,isinterestedforplacement,paddressline1,paddresslcity,paddressldis,paddresslpin,paddresslstate,paddresslcountry,tpaddressline1,taddresslcity,taddressldis,taddresslpin,taddresslstate,taddresslcountry,is_registered,is_approved,is_placed,bvm_passing_year,ssc_passing_year,ssc_total,ssc_th_percentage,ssc_board,ssc_school,ssc_educational_gap,hsc_passing_year,hsc_th_percentage,hsc_th_p_percentage,hsc_th_marks,hsc_th_p_marks,hsc_board,hsc_school,isd2d,hsc_educational_gap,d2d_passing_year,d2d_cgpa,d2d_college,d2d_sem1,d2d_sem2,d2d_sem3,d2d_sem4,d2d_sem5,d2d_sem6,d2d_backlogs,d2d_educational_gap,bvm_sem1,bvm_sem2,bvm_sem3,bvm_sem4,bvm_sem5,bvm_sem6,bvm_sem7,bvm_sem8,bvm_active_backlog,bvm_dead_backlog,bvm_total_backlog,bvm_cpi,ssc_marksheet,hsc_marksheet,d2d_marksheet,bvm_marksheet,resume,primary_resume,photo  FROM `student`,`student_academic`,`student_document` where student.id_number=student_document.s_id and student.id_number=student_academic.s_id ";


if (isset($_POST["company"]) && ($_POST["company"] == "1")) {
    $columnHeader = "Sr. No." . "\t" . "Student ID" . "\t" . "First Name" . "\t" . "Middle name" . "\t" . "Last name" . "\t" . "Gender" . "\t" . "Mobile" . "\t" . "Primary Email" . "\t" . "Secondary Email" . "\t" . "Department ID" . "\t" . "Linkedin URL" . "\t" . "Date of Birth" . "\t" . "Enrollment Number" . "\t" . "Category" . "\t" . "Is interested for Placement" . "\t" . "Permanent Address Line 1" . "\t" . "Permanent Address City" . "\t" . "Permanent Address District" . "\t" . "Permanent Address Pincode" . "\t" . "Permanent Address State" . "\t" . "Permanent Address Country" . "\t" . "Current Address Line 1" . "\t" . "Current Address City" . "\t" . "Current Address District" . "\t" . "Current Address Pincode" . "\t" . "Current Address State" . "\t" . "Current Address Country" . "\t" . "Is Registered?" . "\t" . "Is Approved?" . "\t" . "Is Placed?" . "\t" . "BVM Passing Year" . "\t" . "SSC Passing Year" . "\t" . "SSC Total" . "\t" . "SSC Percentage" . "\t" . "SSC Board" . "\t" . "SSC School Name" . "\t" . "SSC Educational Gap" . "\t" . "HSC Passing Year" . "\t" . "HSC Theory Percentage" . "\t" . "HSC Theory+Practical Percentage" . "\t" . "HSC Theory Marks" . "\t" . "HSC Theory+Practical Marks" . "\t" . "HSC Board" . "\t" . "HSC School Name" . "\t" . "Is D2D?" . "\t" . "HSC Educational Gap" . "\t" . "Diploma Passing Year" . "\t" . "Diploma CGPA" . "\t" . "Diploma College Name" . "\t" . "Diploma Sem 1 SPI" . "\t" . "Diploma Sem 2 SPI" . "\t" . "Diploma Sem 3 SPI" . "\t" . "Diploma Sem 4 SPI" . "\t" . "Diploma Sem 5 SPI" . "\t" . "Diploma Sem 6 SPI" . "\t" . "Diploma Backlogs" . "\t" . "Diploma Educational Gaps" . "\t" . "BVM Sem 1 SPI" . "\t" . "BVM Sem 2 SPI" . "\t" . "BVM Sem 3 SPI" . "\t" . "BVM Sem 4 SPI" . "\t" . "BVM Sem 5 SPI" . "\t" . "BVM Sem 6 SPI" . "\t" . "BVM Sem 7 SPI" . "\t" . "BVM Sem 8 SPI" . "\t" . "BVM Active Backlog" . "\t" . "BVM Dead Backlog" . "\t" . "BVM Total Backlogs" . "\t" . "BVM CPI" . "\t" . "SSC Marksheet Link" . "\t" . "HSC Marksheet Link" . "\t" . "Diploma Marksheet Link" . "\t" . "BVM Marksheet Link" . "\t" . "Secondary Resume Marksheet Link" . "\t" . "Primary Resume Link" . "\t" . "Photo Link" . "\t" . "Company Name" . "\t" . "Job Role" . "\t" . "Salary";
} else {
    $columnHeader = "Sr. No." . "\t" . "Student ID" . "\t" . "First Name" . "\t" . "Middle name" . "\t" . "Last name" . "\t" . "Gender" . "\t" . "Mobile" . "\t" . "Primary Email" . "\t" . "Secondary Email" . "\t" . "Department ID" . "\t" . "Linkedin URL" . "\t" . "Date of Birth" . "\t" . "Enrollment Number" . "\t" . "Category" . "\t" . "Is interested for Placement" . "\t" . "Permanent Address Line 1" . "\t" . "Permanent Address City" . "\t" . "Permanent Address District" . "\t" . "Permanent Address Pincode" . "\t" . "Permanent Address State" . "\t" . "Permanent Address Country" . "\t" . "Current Address Line 1" . "\t" . "Current Address City" . "\t" . "Current Address District" . "\t" . "Current Address Pincode" . "\t" . "Current Address State" . "\t" . "Current Address Country" . "\t" . "Is Registered?" . "\t" . "Is Approved?" . "\t" . "Is Placed?" . "\t" . "BVM Passing Year" . "\t" . "SSC Passing Year" . "\t" . "SSC Total" . "\t" . "SSC Percentage" . "\t" . "SSC Board" . "\t" . "SSC School Name" . "\t" . "SSC Educational Gap" . "\t" . "HSC Passing Year" . "\t" . "HSC Theory Percentage" . "\t" . "HSC Theory+Practical Percentage" . "\t" . "HSC Theory Marks" . "\t" . "HSC Theory+Practical Marks" . "\t" . "HSC Board" . "\t" . "HSC School Name" . "\t" . "Is D2D?" . "\t" . "HSC Educational Gap" . "\t" . "Diploma Passing Year" . "\t" . "Diploma CGPA" . "\t" . "Diploma College Name" . "\t" . "Diploma Sem 1 SPI" . "\t" . "Diploma Sem 2 SPI" . "\t" . "Diploma Sem 3 SPI" . "\t" . "Diploma Sem 4 SPI" . "\t" . "Diploma Sem 5 SPI" . "\t" . "Diploma Sem 6 SPI" . "\t" . "Diploma Backlogs" . "\t" . "Diploma Educational Gaps" . "\t" . "BVM Sem 1 SPI" . "\t" . "BVM Sem 2 SPI" . "\t" . "BVM Sem 3 SPI" . "\t" . "BVM Sem 4 SPI" . "\t" . "BVM Sem 5 SPI" . "\t" . "BVM Sem 6 SPI" . "\t" . "BVM Sem 7 SPI" . "\t" . "BVM Sem 8 SPI" . "\t" . "BVM Active Backlog" . "\t" . "BVM Dead Backlog" . "\t" . "BVM Total Backlogs" . "\t" . "BVM CPI" . "\t" . "SSC Marksheet Link" . "\t" . "HSC Marksheet Link" . "\t" . "Diploma Marksheet Link" . "\t" . "BVM Marksheet Link" . "\t" . "Secondary Resume Marksheet Link" . "\t" . "Primary Resume Link" . "\t" . "Photo Link";
}


$setData = '';
$rowData = '';
$value = '';
$main_query = '';

if (isset($_POST["company"])) {
    if ($_POST["company"] == "1") {
        $sqlforstu = "select result_id,student_placed from result";
        $search = $conn->query($sqlforstu);
        while ($row = $search->fetch_assoc()) {
            $sql = "";
            $applied_stu = $row["student_placed"];
            $result_id = $row["result_id"];
            $applied_stu = json_decode($applied_stu, true);
            $sql_with_comp = "SELECT ROW_NUMBER() OVER (ORDER BY id_number),id_number,first_name,middle_name,last_name,gender,mobile,pemail,semail,dept_id,linkedinurl,dob,enrolno,category,isinterestedforplacement,paddressline1,paddresslcity,paddressldis,paddresslpin,paddresslstate,paddresslcountry,tpaddressline1,taddresslcity,taddressldis,taddresslpin,taddresslstate,taddresslcountry,is_registered,is_approved,is_placed,bvm_passing_year,ssc_passing_year,ssc_total,ssc_th_percentage,ssc_board,ssc_school,ssc_educational_gap,hsc_passing_year,hsc_th_percentage,hsc_th_p_percentage,hsc_th_marks,hsc_th_p_marks,hsc_board,hsc_school,isd2d,hsc_educational_gap,d2d_passing_year,d2d_cgpa,d2d_college,d2d_sem1,d2d_sem2,d2d_sem3,d2d_sem4,d2d_sem5,d2d_sem6,d2d_backlogs,d2d_educational_gap,bvm_sem1,bvm_sem2,bvm_sem3,bvm_sem4,bvm_sem5,bvm_sem6,bvm_sem7,bvm_sem8,bvm_active_backlog,bvm_dead_backlog,bvm_total_backlog,bvm_cpi,ssc_marksheet,hsc_marksheet,d2d_marksheet,bvm_marksheet,resume,primary_resume,photo,comp_name,job_role,salary  FROM `student`,`student_academic`,`student_document`,`company`,`drive`,`result` where LOWER(student.id_number) in ('" . implode('\',\'', $applied_stu)  . "') and student.id_number=student_document.s_id and student.id_number=student_academic.s_id and result.result_id='" . $result_id . "' and result.drive_id=drive.drive_id and result.comp_id=company.comp_id";
            $conditions = "";
            if (isset($_POST["submit"])) {
                if (isset($_POST["all"])) {
                    if (!isset($_POST["interested"])) {
                    } else {
                        if (isset($_POST["department"])) {
                            $conditions .= " and dept_id=" . $_POST["department"];
                        }
                        if ($_POST["interested"] == "1") {
                            $conditions .= " and isinterestedforplacement=1 ";
                            if (isset($_POST["company"])) {
                                if ($_POST["company"] == "0") {
                                    $sql = $sql_normal;
                                    if (isset($_POST["placed"])) {
                                        if ($_POST["placed"] == "1") {
                                            $conditions .= " and is_placed=1 ";
                                        } else {
                                            $conditions .= " and is_placed=0 ";
                                        }
                                    }
                                } else {
                                    $sql = $sql_with_comp;
                                    if (isset($_POST["placed"])) {
                                        if ($_POST["placed"] == "1") {
                                            $conditions .= " and is_placed=1 ";
                                        } else {
                                            $conditions .= " and is_placed=0 ";
                                        }
                                    }
                                }
                            } else {
                                if (isset($_POST["placed"])) {
                                    if ($_POST["placed"] == "1") {
                                        $conditions .= " and is_placed=1 ";
                                    } else {
                                        $conditions .= " and is_placed=0 ";
                                    }
                                }
                            }
                        } else {
                            $conditions .= " and isinterestedforplacement=0 ";
                        }
                    }
                }
            }
            $sql = $sql . " " . $conditions . " ;";
            $main_query .= $sql;
        }
        // echo "main query:" . $main_query . "end";
        if ($conn->multi_query($main_query)) {
            do {
                if ($result = $conn->store_result()) {
                    // echo "result:" . $result . "end";
                    while ($rec = $result->fetch_row()) {
                        // echo "rec:";
                        // print_r($rec);
                        // echo  "end";
                        $rowData = "";
                        foreach ($rec as $value) {
                            $value = '"' . $value . '"' . "\t";
                            $rowData .= $value;
                        }
                        $setData .= trim($rowData) . "\n";
                    }
                    $result->free_result();
                }
            } while ($conn->next_result());
        }
    } else {
        $sql = $sql_normal;
        $conditions = "";
        if (isset($_POST["submit"])) {
            if (isset($_POST["all"])) {
                if (!isset($_POST["interested"])) {
                } else {
                    if (isset($_POST["department"])) {
                        $conditions .= " and dept_id=" . $_POST["department"];
                    }
                    if ($_POST["interested"] == "1") {
                        $conditions .= " and isinterestedforplacement=1 ";
                        if (isset($_POST["company"])) {
                            if (isset($_POST["placed"])) {
                                if ($_POST["placed"] == "1") {
                                    $conditions .= " and is_placed=1 ";
                                } else {
                                    $conditions .= " and is_placed=0 ";
                                }
                            }
                        }
                    } else {
                        $conditions .= " and isinterestedforplacement=0 ";
                        if (isset($_POST["placed"])) {
                            if ($_POST["placed"] == "1") {
                                $conditions .= " and is_placed=1 ";
                            } else {
                                $conditions .= " and is_placed=0 ";
                            }
                        }
                    }
                }
            }
        }
        global $setData;
        $sql = $sql . " " . $conditions;
        $setRec = mysqli_query($conn, $sql);
        while ($rec = mysqli_fetch_row($setRec)) {
            $rowData = '';
            foreach ($rec as $value) {
                $value = '"' . $value . '"' . "\t";
                $rowData .= $value;
            }
            $setData .= trim($rowData) . "\n";
        }
    }
} else {
    $setData = "";
    $sql = $sql_normal;
    $conditions = "";
    if (isset($_POST["submit"])) {
        if (isset($_POST["all"])) {
            if (!isset($_POST["interested"])) {
            } else {
                if (isset($_POST["department"])) {
                    $conditions .= " and dept_id=" . $_POST["department"];
                }
                if ($_POST["interested"] == "1") {
                    $conditions .= " and isinterestedforplacement=1 ";
                    if (isset($_POST["placed"])) {
                        if ($_POST["placed"] == "1") {
                            $conditions .= " and is_placed=1 ";
                        } else {
                            $conditions .= " and is_placed=0 ";
                        }
                    }
                } else {
                    $conditions .= " and isinterestedforplacement=0 ";
                    if (isset($_POST["placed"])) {
                        if ($_POST["placed"] == "1") {
                            $conditions .= " and is_placed=1 ";
                        } else {
                            $conditions .= " and is_placed=0 ";
                        }
                    }
                }
            }
        }
    }
    global $setData;
    $sql = $sql . " " . $conditions;
    $setRec = mysqli_query($conn, $sql);
    while ($rec = mysqli_fetch_row($setRec)) {
        $rowData = '';
        foreach ($rec as $value) {
            $value = '"' . $value . '"' . "\t";
            $rowData .= $value;
        }
        $setData .= trim($rowData) . "\n";
    }
}
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=Student Data.xls");
header("Pragma: no-cache");
header("Expires: 0");
echo ucwords($columnHeader) . "\n" . $setData . "\n";
