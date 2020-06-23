<?php

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "dd";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

function queryCities()
{
    global $conn;
    $query_cities = $conn->query("SELECT id, name FROM cities Order by id");
    $cities = $query_cities->fetch_all(MYSQLI_ASSOC);
    return $cities;
}
