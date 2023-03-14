<?php
function login($conn, $userID, $password ){
    $sql = "SELECT * FROM investigators WHERE InvestID = '$userID'";
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
