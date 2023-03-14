<?php 
$username = "root";
$db = "localhost";
$dbname="trafficcomplaint";
$password = "Laptop12++";

$conn = mysqli_connect($db, $username, $password, $dbname );

if(!$conn){
    die("Connnection failed:".mysqli_connect_error());
}