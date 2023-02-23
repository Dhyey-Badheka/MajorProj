<?php

include("E:\\software\\xamp\\htdocs\\tpc-main\\database.php");

// Department TABLE create query

$drive = "CREATE TABLE IF NOT EXISTS drive(
    drive_id int(10) PRIMARY KEY,
    company_id int(10) ,
    job_role varchar(10) NOT NULL,
    deadline DATE ,
    salary int(10) ,
    location varchar(10) ,
    description TEXT ,
    skillsreq TEXT ,
    bond int(10),
    stipend int(10),
    willprovideinternship int(10) DEFAULT(1),
    ssccriteria int(10),
    hsccriteria int(10),
    cpicriteria decimal(4,2),
    spicriteria decimal(4,2),
    dept_eligible varchar(10) ,
    pdfdoc varchar(10) 
    FOREIGN KEY (company_id) REFERENCES company(comp_id)
)";

// execute the query
$stmt = $conn->prepare($dept);
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