<?php

include("E:\\software\\xamp\\htdocs\\tpc-main\\database.php");




// Student Create Query

$student = "CREATE TABLE IF NOT EXISTS student (
    id_number varchar(20) PRIMARY KEY,
    password varchar(30) NOT NULL,
    first_name varchar(20),
    middle_name varchar(20),
    last_name varchar(20),
    gender varchar(10),
    mobile varchar(10),
    email varchar(30),
    dept_id int(10),
    father_first_name varchar(30),
    father_last_name varchar(30), 
    father_occupation varchar(30),
    mother_first_name varchar(30),
    mother_last_names varchar(30),
    mother_occupation varchar(30),
    ssc_percentile decimal(4,2),
    ssc_percentage decimal(4,2),
    ssc_out_of_600 int(10),
    ssc_passing_year year,
    is_d2d int(10),
    hsc_percentile decimal(4,2),
    hsc_percentage decimal(4,2),
    hsc_physics int(10),
    hsc_chemistry int(10),
    hsc_maths int(10),
    hsc_out_of_650 int(10),
    hsc_passing_year year,
    d2d_cgpa decimal(4,2),
    d2d_passing_year year,
    aadhar_card varchar(20),
    pan_card varchar(20),
    ssc_marksheet varchar(20),
    hsc_marksheet varchar(20),
    d2d_marksheet varchar(20),
    resume varchar(20),
    photo varchar(20),
    is_active int(10) DEFAULT(0),

    FOREIGN KEY (dept_id) REFERENCES department(dept_id)
)";

// create table query run 
if ($conn->query($student) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
