<?php

include("../database.php");

// Department TABLE create query

$tpc = "CREATE TABLE IF NOT EXISTS tpc( tpc_id varchar(20) PRIMARY KEY, tpc_name varchar(64) NOT NULL, tpc_email varchar(64), tpc_password varchar(64), tpc_mobile varchar(10), tpc_dept_id int(10), tpc_is_approved int(10) DEFAULT(0), academic_year int(10), FOREIGN KEY (tpc_dept_id) REFERENCES department(dept_id), FOREIGN KEY (tpc_id) REFERENCES student(id_number) );";

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
    <form action="./tpc.php" method="post">
        TPC
        <input type="submit" value="ADD" name="insert">
    </form>
</body>

</html>