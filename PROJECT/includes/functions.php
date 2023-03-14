<?php
function no_inputs_signup($ID, $firstname, $secondname, $phonenumber, $emailaddress, $passwrd, $password2, $photo){
   
    if (empty($ID) || empty($firstname) || empty($secondname) || empty($phonenumber) || empty($emailaddress) || empty($passwrd) || empty($password2) || empty($photo)){
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
function invalidname($firstname, $secondname) {  
    if (!(preg_match('/^[A-Za-z]*$/', $firstname, $secondname))) {
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

function samePass($passwrd, $password2)  {
   
    if ($passwrd !== $password2) {
        $result = true;
    }
    else {
        $result=false;

    }
    return $result;

}
function IDEmailexists($conn, $ID, $emailaddress)  {
   
    $sql = "SELECT * FROM USERS WHERE ID = ? OR emailaddress = ?;";
   //writing prepared statements to prevent the user from changing the code from the UI design infront or prevent any form of sql injection
    $stmt = mysqli_stmt_init($conn);
//if prepare statement will fail or any mistakes that happened in the code
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }else
   //grabbikng data from the database and checks if the user doesnot exst in the db
    mysqli_stmt_bind_param($stmt, "ss", $ID, $emailaddress);
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

function createuser($conn, $ID, $firstname, $secondname, $phonenumber, $emailaddress, $passwrd, $photo,$position) {
   

    $sql = "INSERT INTO users (ID, firstname, secondname,phonenumber, emailaddress, passwrd, photo) VALUES(?,?,?,?,?,?,?)";
   //writing prepared statements to prevent the user from changing the code from the UI design infront or prevent any form of sql injection
    $stmt = mysqli_stmt_init($conn);

//if prepare statement will fail or any mistakes that happened in the code
    if(!mysqli_stmt_prepare($stmt, $sql))
    {
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }else
    move_uploaded_file($_FILES['photo']['tmp_name'],$position);
    //the hashing method automtically updates 
    
    $hashedpwd = password_hash($passwrd, PASSWORD_DEFAULT);

    //grabbikng data from the database and checks if the user doesnot exst in the db
    

    mysqli_stmt_bind_param($stmt, "issssss", $ID, $firstname, $secondname, $phonenumber, $emailaddress, $hashedpwd, $photo);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../signup.php?error=none");
    exit();
}

//LOGIN SCRIPT
function login($conn, $userID, $password ){
    $sql = "SELECT * FROM users WHERE ID = '$userID'";
    $query = mysqli_query($conn, $sql);
    return $query;
    }

function no_inputs_login($userID, $password ){
    if (empty($userID) || empty($password)){
        $result = true;
    }
    else {
        $result=false;

    }
    return $result;
}

//roadcomplaints function
