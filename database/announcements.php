<?php

include("../database.php");

// Department TABLE create query

$create = "CREATE TABLE IF NOT EXISTS announcement(
    announcement_id int(10) PRIMARY KEY,
    title TEXT,
    description TEXT,
    posted_on DATE 
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