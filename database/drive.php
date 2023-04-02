<?php


include("../database.php");

// Department TABLE create query

$drive = "CREATE TABLE IF NOT EXISTS drive(
    drive_id int(10) PRIMARY KEY,
    company_id int(10) ,
    job_role varchar(64) NOT NULL,
    deadline DATE ,
    salary int(10) ,
    location varchar(64) ,
    description TEXT ,
    skillsreq TEXT ,
    bond decimal(2,1),
    stipend int(10),
    willprovideinternship int(10) DEFAULT(1),
    internship_duration int(10),
    ssccriteria decimal(4,2),
    hsccriteria decimal(4,2),
    cpicriteria decimal(4,2),
    spicriteria decimal(4,2),
    active_backlog int(10),
    total_backlog int(10),
    dept_eligible json,
    pdfdoc varchar(10) 
    no_of_job_role int(10),
    job_role json,
    FOREIGN KEY (company_id) REFERENCES company(company_id)
)";

// execute the query
$stmt = $conn->prepare($drive);
$stmt->execute();

?>
<html>

<head>
    <title>
        HELPER
    </title>
</head>

<body>
    <form action="./drive.php" method="post">
        DRIVE
        <input type="submit" value="ADD" name="insert">
    </form>
</body>

</html>