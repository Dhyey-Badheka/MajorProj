<?php

// Defining the credentials for the database
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "tpc";

// Connection Object
$conn = new mysqli($serverName, $userName, $password, $dbName);

// If error occurs then display the error
if ($conn->connect_error) {
    die("Connection Failed : " . $conn->connect_error);
}
?>