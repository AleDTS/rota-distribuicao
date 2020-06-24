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
    $query_cities = $conn->query("SELECT id, name FROM cities Order by name");
    $cities = $query_cities->fetch_all(MYSQLI_ASSOC);
    return $cities;
}

function queryCitiesP()
{
    global $conn;
    $query_cities = $conn->query("SELECT ST_X(coordinate) as lat, ST_Y(coordinate) as lng, name FROM cities");
    $cities = $query_cities->fetch_all(MYSQLI_ASSOC);
    return $cities;
}
