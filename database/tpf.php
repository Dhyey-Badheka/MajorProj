<?php

include("E:\\software\\xamp\\htdocs\\tpc-main\\database.php");

// Department TABLE create query

$tpf = "CREATE TABLE IF NOT EXISTS tpf(
    tpf_id int(10) PRIMARY KEY,
    tpf_name varchar(10) NOT NULL,
    tpf_email varchar(50),
    tpf_password varchar(50),
    tpf_mobile varchar(10),
    tpf_dept_id varchar(10),
    tpf_is_approved int(10) DEFAULT(0),
    FOREIGN KEY (tpf_dept_id) REFERENCES department(dept_id)
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
    <form action="./tpf.php" method="post">
        TPF
        <input type="submit" value="ADD" name="insert">
    </form>
</body>

</html>