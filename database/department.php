<?php

include("../database.php");

// Department TABLE create query

$dept = "CREATE TABLE IF NOT EXISTS department(
    dept_id int(10) PRIMARY KEY,
    dept_name varchar(64) NOT NULL,
    dept_tpf_id longtext,
    dept_tpc_id longtext,
    dept_totalstu int(10) default(0),
    dept_intereststu int(10) default(0),
    dept_placedstu int(10) default(0),
    dept_avgpack decimal(4,2) default(0.00),
    dept_tot_company_visited int(10) default(0),
    dept_tot_drive_completed int(10) default(0)
)";

// execute the query
$stmt = $conn->prepare($dept);
$stmt->execute();


if (isset($_POST["insert"])) {
    $rec1 = "INSERT INTO department(dept_id,dept_name) values (1,'CE');";
    $rec2 = "INSERT INTO department(dept_id,dept_name) values (2,'CP');";
    $rec3 = "INSERT INTO department(dept_id,dept_name) values (3,'EC');";
    $rec4 = "INSERT INTO department(dept_id,dept_name) values (4,'EE');";
    $rec5 = "INSERT INTO department(dept_id,dept_name) values (5,'EL');";
    $rec6 = "INSERT INTO department(dept_id,dept_name) values (6,'IT');";
    $rec7 = "INSERT INTO department(dept_id,dept_name) values (7,'ME');";
    $rec8 = "INSERT INTO department(dept_id,dept_name) values (8,'PE');";
    $stmts = array($rec1, $rec2, $rec2, $rec3, $rec4, $rec5, $rec6, $rec7, $rec8);
    for ($i = 0; $i < count($stmts); $i++) {
        $stmt = $stmts[$i];
        if ($conn->query($stmt) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
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