<?php

$host = "localhost";
$dbname = "id21015324_login_data";
$username = "id21015324_logindatabase";
$password = "DC8cqPGM8Y!";


$mysqli = new mysqli($host,$username,$password,$dbname);

 
                                       
if ($mysqli->connect_errno) {
    die("Connection error: " . $mysqli->connect_error);
}

return $mysqli;

?>