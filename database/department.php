<?php

include("E:\\software\\xamp\\htdocs\\tpc-main\\database.php");

// Department TABLE create query

$dept = "CREATE TABLE IF NOT EXISTS department(
    dept_id int(10) PRIMARY KEY,
    dept_name varchar(10) NOT NULL,
    dept_tpf_id varchar(10) ,
    dept_tpc_id varchar(10) ,
    dept_totalstu int(10),
    dept_intereststu int(10),
    dept_placedstu int(10),
    dept_avgpack int(10),
    dept_company_visited int(10),
    dept_drive_completed int(10)
    FOREIGN KEY (dept_tpf_id) REFERENCES tpf(tpf_id)
    FOREIGN KEY (dept_tpc_id) REFERENCES tpc(tpc_id)
)";

// execute the query
$stmt = $conn->prepare($dept);
$stmt->execute();

if (isset($_POST["insert"])) {
    $rec1 = "INSERT INTO department values (1,'CE')";
    $rec2 = "INSERT INTO department values (2,'CP')";
    $rec3 = "INSERT INTO department values (3,'EC')";
    $rec4 = "INSERT INTO department values (4,'EE')";
    $rec5 = "INSERT INTO department values (5,'EL')";
    $rec6 = "INSERT INTO department values (6,'IT')";
    $rec7 = "INSERT INTO department values (7,'ME')";
    $rec8 = "INSERT INTO department values (8,'PE')";
    $stmts = array($rec1, $rec2, $rec2, $rec3, $rec4, $rec5, $rec6, $rec7, $rec8);
    for ($i = 0; $i < count($stmts); $i++) {
        $stmt = $conn->prepare($stms[$i]);
        $stmt->execute();
    }
}

?>
<html>

<head>
    <title>
        HELPER
    </title>
</head>

<body>
    <form action="./department.php" method="post">
        DEPARTMENT
        <input type="submit" value="ADD" name="insert">
    </form>
</body>

</html>