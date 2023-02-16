<?php
include("E:\\software\\xamp\\htdocs\\tpc-main\\database.php");



// admin login table creation query
$admin = "CREATE TABLE IF NOT EXISTS admin (
    user_name varchar(20) PRIMARY KEY,
    password varchar(20) NOT NULL
)";
$conn->query($admin);

if (isset($_POST["admin"])) {
    $insert = "INSERT INTO admin values('admin','1234')";
    $conn->query($insert);
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN</title>
</head>

<body>
    <form action="./admin.php" method="post">
        <input type="submit" name="admin" value="ADMIN">
    </form>
</body>

</html>