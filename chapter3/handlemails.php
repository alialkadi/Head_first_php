<?php

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$errors = [];
if(empty($fname) && !empty($lname) && !empty($email)){
    $errors[] = 'please enter first name';
}
if(!empty($fname) && !empty($lname) && empty($email)){
    $errors[] = 'please enter email';
}
if(!empty($fname) && empty($lname) && !empty($email)){
    $errors[] = 'please enter last name';
}
if (!empty($fname) && !empty($lname) && !empty($email)) {
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'admin';
    $dbname = 'hfmails';
    $dbc = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    $query = "INSERT INTO mail_list (fname,lname,email) values ('$fname','$lname','$email')";
    // insert into mail_list (fname,lname,email) values ('lolo','loly','lo@lo.lo');
    mysqli_query($dbc, $query);
    mysqli_close($dbc);
    echo "is Done";
    // header("location:emails.php");
} else {
    echo "not Done";
    // header("location:./emails.php");
}

?>