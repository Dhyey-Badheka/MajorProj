<?php
include("E:\\software\\xamp\\htdocs\\tpc-main\\database.php");


// $add_query = "INSERT INTO 'student'('id_number', 'password', 'first_name', 'mobile', 'pemail', 'dept_id') VALUES ('$id_number','$password','$name','$mobile','$email','$dept')";

// // run the query 

// if ($conn->query($add_query))

// admin login table creation query

$admin = "CREATE TABLE IF NOT EXISTS admin (
    tpo_id varchar(20) PRIMARY KEY,
        tpo_name varchar(50),
        tpo_email varchar(40),
        tpo_number varchar(10),
        tpo_password varchar(64)
)";
$conn->query($admin);

$password = base64_encode(strrev(md5("123456")));
$insert = "INSERT INTO admin (tpo_email,password) values ('admin@bvmengineering.ac.in','$password')";
if (mysqli_query($conn, $insert)) {
    echo "New record created successfully";
} else {
    echo mysqli_error($conn);
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