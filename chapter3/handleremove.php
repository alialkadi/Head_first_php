<?php

$email = $_POST['email'];

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'admin';
$dbname = 'hfmails';
$dbc = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$query = "DELETE from mail_list where email ='$email'";
$result = mysqli_query($dbc, $query);  