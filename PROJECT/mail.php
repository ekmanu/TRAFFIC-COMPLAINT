<?php
session_start();
include_once './includes/conn.php';

$UID=  $_SESSION["USERID"];
$sql = "SELECT * FROM users WHERE ID='$UID'";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result)>0){
    while($row = mysqli_fetch_assoc($result)){
        
        $_SESSION['FIRSTNAME']= $row['firstname'];
        $_SESSION['SECONDNAME']= $row['secondname'];
        $_SESSION['EMAILADDRESS']= $row['emailaddress'];
        $_SESSION['PHOTO']= $row['photo'];
        $_SESSION['PHONE']= $row['phonenumber'];
    }
}




