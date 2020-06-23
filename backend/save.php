<?php

require 'database.php';

$sql = "INSERT INTO cities (name, coordinate) 
VALUES ('{$_POST['name']}', POINT({$_POST['latitude']}, {$_POST['longitude']}))";

$cities = FALSE;

if ($conn->query($sql)) {
    $atualizou = TRUE;

    $query_cities = $conn->query("SELECT id, name FROM cities Order by name");
    $cities = $query_cities->fetch_all(MYSQLI_ASSOC);
}

echo json_encode($cities);

$conn->close();
