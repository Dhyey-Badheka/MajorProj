<?php


include("E:\\software\\xamp\\htdocs\\tpc-main\\database.php");

// Department TABLE create query

$dept = "CREATE TABLE IF NOT EXISTS department(
    dept_id int(10) PRIMARY KEY,
    dept_name varchar(10) NOT NULL
)";

// execute the query
$stmt = $conn->prepare($dept);
$stmt->execute();

if (isset($_POST["insert"])) {
    $rec1 = "INSERT INTO department values (1,'Computer')";
    $rec2 = "INSERT INTO department values (2,'Civil')";
    $rec3 = "INSERT INTO department values (3,'Mechanical')";
    $stmt = $conn->prepare($rec1);
    $stmt->execute();

    $stmt = $conn->prepare($rec2);
    $stmt->execute();

    $stmt = $conn->prepare($rec3);
    $stmt->execute();
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