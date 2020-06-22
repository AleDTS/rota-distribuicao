<?php

require 'database.php';

$name = $_POST['name'];
$point = "POINT({$_POST['name']}, {$_POST['name']})";

$sql = "INSERT INTO cities (name, point) 


  VALUES ({$name}, {$point})";

$result = $mysqli->query($sql);


$sql = "SELECT * FROM items Order by id desc LIMIT 1";


$result = $mysqli->query($sql);


$data = $result->fetch_assoc();


echo json_encode($data);
