<?php

include("../database.php");

function create_student_document($conn)
{
    $create = "CREATE TABLE IF NOT EXISTS student_document(
        s_id varchar(20) PRIMARY KEY,
        ssc_marksheet varchar(64),
        hsc_marksheet varchar(64),
        d2d_marksheet varchar(64),
        bvm_marksheet varchar(64),
        resume varchar(64),
        photo varchar(64),
        FOREIGN KEY (s_id) REFERENCES student(s_id)
        
    )";
    if ($conn->query($create)) {
        $result = array("message" => "Successfully created STUDENT DOCUMENT table");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on creating STUDENT DOCUMENT table");
        return json_encode($result);
    }
}

function insert_data_student_document($conn)
{

    $insert = "INSERT INTO document (`tpc_id`,`tpc_fname`,`tpc_lname`,`tpc_email`,`tpc_mobile`,`tpc_password`,`tpc_department`,`is_active`,`academic_year`) values ('19CP015','Jimish','Ravat','jimish@bvm.com','9876543211','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=',3,1,2019),('18CP013','Mehul','Parmar','shah@bvm.com','9876543211','ZTM4OGYwMmY3NTBlNjVlYmJhOTVhYjk0OTNjZGEwMWU=',3,0,2018)";

    if ($conn->query($insert)) {
        $result = array("message" => "Successfully added STUDENT DOCUMENT Data");
        return json_encode($result);
    } else {
        $result = array("message" => "Error Occured on adding STUDENT DOCUMENT Data");
        return json_encode($result);
    }
}
