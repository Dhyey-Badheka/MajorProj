<?php

include("../database.php");




// Student Create Query

$student = "CREATE TABLE IF NOT EXISTS student (
    id_number varchar(64) PRIMARY KEY,
    password varchar(64) NOT NULL,
    first_name varchar(64),
    middle_name varchar(64),
    last_name varchar(64),
    gender varchar(10),
    mobile bigint(10),
    pemail varchar(64) UNIQUE,
    semail varchar(64) UNIQUE,
    dept_id int(10),
    linkedinurl varchar(64) ,
    dob DATE NOT NULL,
    enrolno varchar(64) ,
    category varchar(64),
    isinterestedforplacement int(10) DEFAULT(1), 
    paddressl1 varchar(64),
    paddresslcit varchar(64),
    paddressldis varchar(64),
    paddresslpin int(6),
    paddresslstat varchar(64),
    paddresslcountry varchar(64),
    taddressl1 varchar(64),
    taddresslcit varchar(64),
    taddressldis varchar(64),
    taddresslpin int(6),
    taddresslstat varchar(64),
    taddresslcount varchar(64),
    is_registered int(10) DEFAULT(0),
    is_approved int(10) DEFAULT(0),
    is_placed int(10) DEFAULT(0),
    FOREIGN KEY (dept_id) REFERENCES department(dept_id)
)";

// create table query run 
if ($conn->query($student) === TRUE) {
    echo "Table Students created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
