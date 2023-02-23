<?php

include("E:\\software\\xamp\\htdocs\\tpc-main\\database.php");

// Department TABLE create query

$comp = "CREATE TABLE IF NOT EXISTS company(
    comp_id int(10) PRIMARY KEY,
    comp_name varchar(10) NOT NULL,
    comp_hr_name varchar(10) ,
    comp_hr_email varchar(10) ,
    comp_hr_mobile int(10) ,
    comp_url varchar(10) ,
    comp_logo varchar(10) ,
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
    <form action="./department.php" method="post">
        COMPANY
        <input type="submit" value="ADD" name="insert">
    </form>
</body>

</html>