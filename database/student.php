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
    pemail varchar(30) UNIQUE,
    semail varchar(30) UNIQUE,
    dept_id int(10),
    linkedinurl varchar(30) ,
    dob DATE NOT NULL,
    enrolno varchar(20) ,
    category varchar(20),
    isinterestedforplacement int(10) DEFAULT(1), 
    paddressl1 varchar(20),
    paddresslcit varchar(20),
    paddressldis varchar(20),
    paddresslpin int(20),
    paddresslstat varchar(20),
    paddresslcount varchar(20),
    taddressl1 varchar(20),
    taddresslcit varchar(20),
    taddressldis varchar(20),
    taddresslpin int(20),
    taddresslstat varchar(20),
    taddresslcount varchar(20),
    ssc_passingy int(4),
    ssc_percentage decimal(4,2),
    ssc_out_of_600 int(10),
    ssc_board varchar(20),
    ssc_schoolname varchar(20),
    ssc_afteredugap int(10),
    ssc_marksheet varchar(20),
    is_d2d int(10),
    hsc_passingy int(4),
    hsc_percentagetp decimal(4,2),
    hsc_percentaget decimal(4,2),
    hsc_out_of_500 int(10),
    hsc_out_of_650 int(10),
    hsc_board varchar(20),
    hsc_schoolname varchar(20),
    hsc_afteredugap int(10),
    hsc_marksheet varchar(20),
    d2d_cgpa decimal(4,2),
    d2d_cpi decimal(4,2),
    d2d_schoolname varchar(20),
    d2d_passing_year year,
    d2d_sem1_spi decimal(4,2),
    d2d_sem2_spi decimal(4,2),
    d2d_sem3_spi decimal(4,2),
    d2d_sem4_spi decimal(4,2),
    d2d_sem5_spi decimal(4,2),
    d2d_sem6_spi decimal(4,2),
    d2d_sem1 varchar(20),
    d2d_sem2 varchar(20),
    d2d_sem3 varchar(20),
    d2d_sem4 varchar(20),
    d2d_sem5 varchar(20),
    d2d_sem6 varchar(20),
    d2d_certi varchar(20),
    d2d_bcklogs int(10),
    d2d_afteredugap int(10),
    d2d_marksheet varchar(20),
    bvm_sem1_spi decimal(4,2),
    bvm_sem2_spi decimal(4,2),
    bvm_sem3_spi decimal(4,2),
    bvm_sem4_spi decimal(4,2),
    bvm_sem5_spi decimal(4,2),
    bvm_sem6_spi decimal(4,2),
    bvm_sem1 varchar(20),
    bvm_sem2 varchar(20),
    bvm_sem3 varchar(20),
    bvm_sem4 varchar(20),
    bvm_sem5 varchar(20),
    bvm_sem6 varchar(20),
    bvm_cpi decimal(4,2),
    bvm_activebcklog int(10),
    bvm_activebcklog int(10),
    bvm_totalbcklog int(10),
    resume varchar(20),
    photo varchar(30),
    is_registered int(10) DEFAULT(0),
    is_approved int(10) DEFAULT(0),
    is_placed int(10) DEFAULT(0),
    company_placed int(10)
    FOREIGN KEY (dept_id) REFERENCES department(dept_id)
)";

// create table query run 
if ($conn->query($student) === TRUE) {
    echo "Table MyGuests created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
