<?php

include("../database.php");
$a = ["3", "10"];
$a = json_encode($a);
$query = $conn->query("SELECT * FROM announcement");
while ($row = $query->fetch_assoc()) {

    $b = json_decode($row["dept"], true);
    foreach ($b as $key) {
        echo intval($key) . " ";
        # code...
    }
}
$var = json_encode(["3", "10"]);
$update = $conn->query("UPDATE annoucements SET dept_eligible = '$var' WHERE annouce_id='2'");
