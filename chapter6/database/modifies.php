<?php

$conn= mysqli_connect("localhost","root","","headfirst");
$query = "ALTER TABLE guitarwars ADD COLUMN screenshot varchar(120)";
$result = mysqli_query($conn,$query);
mysqli_close($conn);