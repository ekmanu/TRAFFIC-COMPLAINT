<?php
require_once './polisifunctions.php';
require_once '../includes/conn.php';
if (isset($_POST["submit"])){
    $ID = $_POST["ID"];  
    $firstname = $_POST["firstname"];
    $secondname = $_POST["secondname"];
    $policestation = $_POST["policestation"];
    $gender= $_POST["gender"];
    $phonenumber = $_POST["phonenumber"];
    $emailaddress = $_POST["emailaddress"];
    $residence = $_POST["residence"];
    $photo=$_FILES['photo']['name'];
    $position= "../images/".basename($_FILES['photo']['name']);
    $photosize=$_FILES['photo']['size'];
    $validphotoextension=['jpg','jpeg','png'];
    $photoextension = explode('.',$photo);
    $photoextension= strtolower(end($photoextension));

    if(invalidphotoextension($photoextension,$validphotoextension) !==false){
        header("location: ./addpolice.php?error=invalidphotoextension");
        exit();
        
    }
    if(invalidsize($photosize)==false){
        header("location: ./addpolice.php?error=invalidsize");
        exit(); 
    }

    if (no_inputs_signup($ID, $firstname,$secondname, $policestation, $phonenumber, $emailaddress,$residence,$photo) !==false){
        header("location: ./addpolice.php?error=emptyinput");
        exit();
    }

    if (invalidname($firstname,$secondname) !==false){
        header("location: ./addpolice.php?error=invalidfirstname");
        exit();
    }
    if (invalidtelephone($phonenumber) !==false){
        header("location: ./addpolice.php?error=invalidtelephone");
        exit();
    }
    
    if (invalidEmail($emailaddress) !==false){
        header("location: ./addpolice.php?error=invalidEmail");
        exit();
    }
    if (IDEmailexists($conn, $ID, $emailaddress) !==false){
        header("location: ./addpolice.php?error=IDtaken");
        exit();
    }
  
    createofficer($conn, $ID, $firstname,$secondname,$policestation,$gender, $phonenumber, $emailaddress, $residence,$photo,$position);
    
}
else{
    header("location: ./addpolice.php");
    exit();
}
