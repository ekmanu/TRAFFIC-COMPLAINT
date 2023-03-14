<?php
require_once './registercarfunction.php';
require_once '../includes/conn.php';
if (isset($_POST["submit"])){
    $ID = $_POST["ID"];  
    $firstname = $_POST["firstname"];
    $secondname = $_POST["secondname"];
    $carreg = $_POST["carreg"];
    $carmake = $_POST["carmake"];
    $typo= $_POST["type"];
    $colour= $_POST["colour"];
    $phonenumber = $_POST["phonenumber"];
    $emailaddress = $_POST["emailaddress"];
    $residence = $_POST["residence"];

    if (no_inputs_signup($ID, $firstname,$secondname,$carreg, $carmake,$typo, $phonenumber, $emailaddress,$colour,$residence) !==false){
        header("location: ./adddriver.php?error=emptyinput");
        exit();
    }

    if (invalidname($firstname,$secondname) !==false){
        header("location: ./adddriver.php?error=invalidfirstname");
        exit();
    }
    if (invalidtelephone($phonenumber) !==false){
        header("location: ./adddriver.php?error=invalidtelephone");
        exit();
    }
    
    if (invalidEmail($emailaddress) !==false){
        header("location: ./adddriver.php?error=invalidEmail");
        exit();
    }
    if (IDEmailexists($conn, $ID, $emailaddress) !==false){
        header("location: ./adddriver.php?error=IDtaken");
        exit();
    }
  
    createcar($conn,$firstname,$ID,$phonenumber,$emailaddress,$carreg,$carmake,$typo,$colour,$residence,$secondname);    
}
else{
    header("location: ./addpolice.php");
    exit();
}
