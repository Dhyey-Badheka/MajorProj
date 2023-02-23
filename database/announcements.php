<?php

include("E:\\software\\xamp\\htdocs\\tpc-main\\database.php");

// Department TABLE create query

$announcement = "CREATE TABLE IF NOT EXISTS announcement(
    announcement_id int(10) PRIMARY KEY,
    heading TEXT,
    description TEXT,
    posted_on DATE ,
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
    <form action="./announcement.php" method="post">
        announcement
        <input type="submit" value="ADD" name="insert">
    </form>
</body>

</html>