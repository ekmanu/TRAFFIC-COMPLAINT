<?php
function no_inputs_signup($ID, $firstname,$secondname,$policestation, $phonenumber, $emailaddress,$residence,$photo){
   
    if (empty($ID) || empty($firstname) || empty($secondname) || empty($policestation) || empty($phonenumber) || empty($emailaddress) ||empty($residence) || empty($photo)){
        $result = true;
    }
    else {
        $result=false;

    }
    return $result;

 
}
function invalidphotoextension($photoextension,$validphotoextension)
{
    if(!in_array($photoextension,$validphotoextension)){
        $result = true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidsize($photosize)
{
    if($photosize > 5000000){
        $result =false;
    }else{
        $result = true;
    }
    return $result;
}
function invalidname($firstname,$secondname) {  
    if (!(preg_match('/^[A-Za-z]*$/', $firstname,$secondname))) {
        $result = true;
    }
    else {
        $result=false;
    }
    return $result;
}

function invalidtelephone($phonenumber) {  
    if (!(preg_match('/^[+2547][0-9]*$/', $phonenumber))) {
        $result = true;
    }
    else {
        $result=false;
    }
    return $result;
}
function invalidEmail($emailaddress) {  
    if (!filter_var($emailaddress, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    }
    else {
        $result=false;
    }
    return $result;
}

function IDEmailexists($conn, $emailaddress)  {
   
    $sql = "SELECT * FROM policeofficer WHERE EMAIL = ? or BADGENO=? ;";
   //writing prepared statements to prevent the user from changing the code from the UI design infront or prevent any form of sql injection
    $stmt = mysqli_stmt_init($conn);
//if prepare statement will fail or any mistakes that happened in the code
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ./addpolice.php?error=stmtfailed");
        exit();
    }else
   //grabbikng data from the database and checks if the user doesnot exst in the db
    mysqli_stmt_bind_param($stmt, "is",$ID,$emailaddress);
    mysqli_stmt_execute($stmt);

    //getting results from the prepared statements the stmt

    $resultData = mysqli_stmt_get_result($stmt);

    //creating a variable while checking for true or false

    if($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }else{
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close($stmt);
}

function createofficer($conn, $ID, $firstname,$secondname,$policestation,$gender, $phonenumber, $emailaddress, $residence,$photo,$position)
{
   

    $sql = "INSERT INTO policeofficer (BADGENO, FULLNAME,secondname, POLICESTATION,GENDER,Phonenumber, EMAIL, RESIDENCE, photo) VALUES(?,?,?,?,?,?,?,?,?)";
   //writing prepared statements to prevent the user from changing the code from the UI design infront or prevent any form of sql injection
    $stmt = mysqli_stmt_init($conn);

//if prepare statement will fail or any mistakes that happened in the code
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ./addpolice.php?error=stmtfailed");
        exit();
    }else
    move_uploaded_file($_FILES['photo']['tmp_name'],$position);
    //the hashing method automtically updates 
    

    //grabbikng data from the database and checks if the user doesnot exst in the db
    

    mysqli_stmt_bind_param($stmt, "issssssss", $ID, $firstname,$secondname,$policestation, $gender, $phonenumber, $emailaddress, $residence, $photo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ./admpolice.php");
    exit();
}
