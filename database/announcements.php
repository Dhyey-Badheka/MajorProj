<?php

include("E:\\software\\xamp\\htdocs\\tpc-main\\database.php");

// Department TABLE create query

$drive = "CREATE TABLE IF NOT EXISTS drive(
    announcement_id int(10) PRIMARY KEY,
    heading TEXT,
    description TEXT,
    deadline DATE ,
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
        DRIVE
        <input type="submit" value="ADD" name="insert">
    </form>
</body>

</html>