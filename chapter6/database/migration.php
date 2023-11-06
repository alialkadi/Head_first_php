<?php

$conn = mysqli_connect("localhost","root","");
// $query = "CREATE DATABASE headfirst";
// $result = mysqli_query($conn, $query);
$query = "USE headfirst";
$result = mysqli_query($conn, $query);
$query = "CREATE TABLE IF NOT EXISTS guitarwars(
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    data varchar(20),
    name VARCHAR(20),
    score VARCHAR(20)
)";
$result = mysqli_query($conn, $query);
mysqli_close($conn);