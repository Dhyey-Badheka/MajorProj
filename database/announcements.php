<?php

include("../database.php");

// Department TABLE create query

$create = "CREATE TABLE IF NOT EXISTS announcement(
    announcement_id int(10) PRIMARY KEY,
    title longtext,
    description longtext,
    posted_on DATE,
    dept json 
)";

$stmt = $conn->prepare($create);
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