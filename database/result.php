<?php

include("E:\\software\\xamp\\htdocs\\tpc-main\\database.php");

// Department TABLE create query

$result = "CREATE TABLE IF NOT EXISTS result(
    result_id int(10) PRIMARY KEY,
    heading TEXT,
    description TEXT,
    no_of_stu int(10),
    posted_on DATE,
    company_placed varchar(20),
    drive_role varchar(20), 
    drive_id int(10) ,
    company_id int(10) ,
    FOREIGN KEY (drive_id) REFERENCES drive(drive_id)
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
    <form action="./result.php" method="post">
        DRIVE
        <input type="submit" value="ADD" name="insert">
    </form>
</body>

</html>