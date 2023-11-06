<?php

$email = "alialkady80@gmail.com";
$content = $_POST['content'];
$subject = $_POST['subject'];



$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = 'admin';
$dbname = 'hfmails';
$dbc = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

$query = "SELECT * from mail_list";
$result = mysqli_query($dbc, $query);


// $rows = mysqli_fetch_array($result);
// print_r($rows['fname']);

while ($row = mysqli_fetch_assoc($result)) {
    echo "this is " . $row["fname"] . " " . $row["email"] . "<br>";
    mail($row["email"], $subject, $content);  
}
