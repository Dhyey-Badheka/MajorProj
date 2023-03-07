<?php

include("../database.php");

function create_student_academic($conn)
{
    $create = "CREATE TABLE IF NOT EXISTS student_academic(
        s_id varchar(20) PRIMARY KEY,
        ssc_passing_year int(10),
        ssc_total int(10),
        ssc_board varchar(64),
        ssc_school varchar(64),
        ssc_educational_gap int(10),
        hsc_passing_year int(10),
        hsc_th_percentage decimal(4,2),
        hsc_th_p_percentage decimal(4,2),
        hsc_th_marks int(10),
        hsc_th_p_marks int(10),
        hsc_board varchar(64),
        hsc_school varchar(64),
        isd2d int(10) default(0),
        hsc_educational_gap int(10),
        d2d_passing_year int(10),
        d2d_cgpa decimal(4,2),
        d2d_college varchar(64),
        d2d_sem1 decimal(4,2),
        d2d_sem2 decimal(4,2),
        d2d_sem3 decimal(4,2),
        d2d_sem4 decimal(4,2),
        d2d_sem5 decimal(4,2),
        d2d_sem6 decimal(4,2),
        d2d_backlogs int(10),
        d2d_educational_gap int(10),
        bvm_sem1 decimal(4,2),
        bvm_sem2 decimal(4,2),
        bvm_sem3 decimal(4,2),
        bvm_sem4 decimal(4,2),
        bvm_sem5 decimal(4,2),
        bvm_sem6 decimal(4,2),
        bvm_active_backlog int(10),
        bvm_dead_backlog int(10),
        bvm_total_backlog int(10),
        bvm_cpi decimal(4,2),
        FOREIGN KEY (s_id) REFERENCES student(id_number)
    )";
    if ($conn->query($create)) {
        $result = array("message" => "Successfully created STUDENT ACADEMIC table");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on creating STUDENT ACADEMIC table");
        return json_encode($result);
    }
}

function insert_data_student_academic($conn)
{

    $insert = "INSERT INTO academic (`tpc_id`,`tpc_fname`,`tpc_lname`,`tpc_email`,`tpc_mobile`,`tpc_password`,`tpc_department`,`is_active`,`academic_year`) values ('19CP015','Jimish','Ravat','jimish@bvm.com','9876543211','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=',3,1,2019),('18CP013','Mehul','Parmar','shah@bvm.com','9876543211','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=',3,0,2018)";

    if ($conn->query($insert)) {
        $result = array("message" => "Successfully added student academic Data");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on adding student academic Data");
        return json_encode($result);
    }
}
