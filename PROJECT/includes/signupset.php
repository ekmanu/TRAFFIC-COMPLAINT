<?php
require_once '../includes/conn.php';
require_once '../includes/functions.php';
if (isset($_POST["submit"])){
    $ID = $_POST["ID"];  
    $firstname = $_POST["firstname"];
    $secondname = $_POST["secondname"];
    $phonenumber = $_POST["phonenumber"];
    $emailaddress = $_POST["emailaddress"];
    $passwrd = $_POST["passwrd"];
    $password2 = $_POST["password2"];
    $photo=$_FILES['photo']['name'];
    $position= "../images/".basename($_FILES['photo']['name']);
    $photosize=$_FILES['photo']['size'];
    $validphotoextension=['jpg','jpeg','png'];
    $photoextension = explode('.',$photo);
    $photoextension= strtolower(end($photoextension));

    if(invalidphotoextension($photoextension,$validphotoextension) !==false){
        header("location: ../signup.php?error=invalidphotoextension");
        exit();
        
    }
    if(invalidsize($photosize)==false){
        header("location: ../signup.php?error=invalidsize");
        exit(); 
    }

    if (no_inputs_signup($ID, $firstname, $secondname, $phonenumber, $emailaddress, $passwrd, $password2,$photo) !==false){
        header("location: ../signup.php?error=emptyinput");
        exit();
    }

    if (invalidname($firstname, $secondname) !==false){
        header("location: ../signup.php?error=invalidfirstname");
        exit();
    }
    if (invalidtelephone($phonenumber) !==false){
        header("location: ../signup.php?error=invalidtelephone");
        exit();
    }
    
    if (invalidEmail($emailaddress) !==false){
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    if (samePass($passwrd, $password2) !==false){
        header("location: ../signup.php?error=passwordsdontmatch");
        exit();
    }
    if (IDEmailexists($conn, $ID, $emailaddress) !==false){
        header("location: ../signup.php?error=IDtaken");
        exit();
    }
  
    createuser($conn, $ID, $firstname, $secondname, $phonenumber, $emailaddress, $passwrd,$photo,$position);
    
}
else{
    header("location: ../signup.php");
    exit();
}
