<?php
function no_inputs_signup($ID, $firstname,$secondname,$phonenumber,$emailaddress, $carreg, $carmake,$typo,$colour,$residence){
   
    if (empty($ID) || empty($firstname) || empty($secondname) || empty($carreg) || empty($carmake) || empty($phonenumber) || empty($emailaddress) ||empty($residence) || empty($typo) || empty($colour)){
        $result = true;
    }
    else {
        $result=false;

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
   
    $sql = "SELECT * FROM driver WHERE EMAIL = ? or OWNERID=? ;";
   //writing prepared statements to prevent the user from changing the code from the UI design infront or prevent any form of sql injection
    $stmt = mysqli_stmt_init($conn);
//if prepare statement will fail or any mistakes that happened in the code
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ./adddriver.php?error=stmtfailed");
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

function  createcar($conn,$firstname,$ID,$phonenumber,$emailaddress,$carreg, $carmake,$typo,$colour,$residence,$secondname)
{
   

    $sql = "INSERT INTO driver (OWNERNAME,OWNERID,CONTACT,EMAIL,CARREG,CARMAKE, CARTYPE, COLOUR, RESIDENCE,secondname) VALUES(?,?,?,?,?,?,?,?,?,?)";
   //writing prepared statements to prevent the user from changing the code from the UI design infront or prevent any form of sql injection
    $stmt = mysqli_stmt_init($conn);

//if prepare statement will fail or any mistakes that happened in the code
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ./adddriver.php?error=stmtfailed");
        exit();
    }else
     

    //grabbikng data from the database and checks if the user doesnot exst in the db
    

    mysqli_stmt_bind_param($stmt, "sissssssss",$firstname,$ID,$phonenumber,$emailaddress,$carreg,$carmake,$typo,$colour,$residence,$secondname);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ./admdriver.php?error=none");
    exit();
}
