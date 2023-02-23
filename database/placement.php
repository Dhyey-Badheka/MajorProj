<?php

include("E:\\software\\xamp\\htdocs\\tpc-main\\database.php");

// Department TABLE create query

$place = "CREATE TABLE IF NOT EXISTS placement(
    place_id int(10) PRIMARY KEY,
    company_id int(10) ,
    drive_id int(10) ,
    job_role varchar(10) NOT NULL,
    company_name varchar(10) NOT NULL,
    student_id varchar(10) ,
    department_id varchar(10),
    salary int(10)  
    FOREIGN KEY (company_id) REFERENCES company(comp_id)
    FOREIGN KEY (drive_id) REFERENCES drive(drive_id)
    FOREIGN KEY (student_id) REFERENCES student(id_number)
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
    <form action="./placement.php" method="post">
        Placement
        <input type="submit" value="ADD" name="insert">
    </form>
</body>

</html>