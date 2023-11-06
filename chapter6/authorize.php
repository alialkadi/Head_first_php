<?php 
// require_once('./variables/appvars.php');
// require_once('./variables/userInfo.php'); 
$username= "lolo";
    $password= "zain";
    if(!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || 
        ($_SERVER['PHP_AUTH_USER'] !== $username || $_SERVER['PHP_AUTH_PW'] !== $password )){
            header('HTTP/1.1 401 Unauthorized');
            header('WWW-Authenticate: Basic realm = "what?"');
            exit('<h2> Sorry, Enter valid email and password to delete account </h2>');
        }
?>