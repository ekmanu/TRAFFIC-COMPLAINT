<?php
function no_inputs($CARREG, $INCIDENTDATE, $LOCATION, $CITY, $DETAILS){
    if (empty($CARREG) || empty($INCIDENTDATE) || empty($LOCATION) || empty($CITY) || empty($DETAILS)){
        $result = true;
    
    }
    else {
        $result=false;

    }
    return $result;
}

function createpcomplaint($conn,$CARREG,$INCIDENTDATE,$LOCATION,$CITY,$DETAILS,$USERID,$STATUS,$media,$position1,$ASSIGN){
    $sql = "INSERT INTO drivercomplaint (CARREG, IncidentDate, street ,CITY, IncidentDESC,USERID,DCOMPSTATUS,media,ASSIGN) VALUES(?,?,?,?,?,?,?,?,?)";
    //writing prepared statements to prevent the user from changing the code from the UI design infront or prevent any form of sql injection
     $stmt = mysqli_stmt_init($conn);
 //if prepare statement will fail or any mistakes that happened in the code
     if(!mysqli_stmt_prepare($stmt, $sql))
     {
         header("location: ./usercomplaints.php?error=stmtfailed");
     }else
     move_uploaded_file($_FILES['media']['tmp_name'],$position1);
     mysqli_stmt_bind_param($stmt, "sssssisss", $CARREG, $INCIDENTDATE, $LOCATION, $CITY, $DETAILS, $USERID,$STATUS,$media,$ASSIGN);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
    
 }
 function invalidmediaextension($mediaextension,$validmediaextension)
{
    if(!in_array($mediaextension,$validmediaextension)){
        $result = true;
    }else{
        $result=false;
    }
    return $result;
}

function invalidmediasize($mediasize)
{
    if($mediasize > 20000000){
        $result =false;
    }else{
        $result = true;
    }
    return $result;
}


  //pollice complaints

 function no_policeinputs($INCIDENTDATES, $LOCATIONS, $CITYY , $DETAIL){
    if ( empty($INCIDENTDATES) || empty($LOCATIONS) || empty($CITYY) || empty($DETAIL)){
        $result = true;
    
    }
    else {
        $result=false;

    }
    return $result;
}


function createpcomplaints($conn,$BADGENO,$INCIDENTDATES,$LOCATIONS,$CITYY,$DETAIL,$USERSID, $STATUS1,$media1,$position12,$ASSIGN1){
    $sql = "INSERT INTO policecomplaints(BADGENO,IncidentDATE,STREET,CITY,IncidentDESC,USERID,PCOMPSTATUS,media,ASSIGN_TO) VALUES(?,?,?,?,?,?,?,?,?)";
    //writing prepared statements to prevent the user from changing the code from the UI design infront or prevent any form of sql injection
     $stmt = mysqli_stmt_init($conn);
 //if prepare statement will fail or any mistakes that happened in the code
     if(!mysqli_stmt_prepare($stmt, $sql))
     {
         header("location: ../policecomplaints.php?error=stmtfailed");
        
     }else
     move_uploaded_file($_FILES['media']['tmp_name'],$position12);
     mysqli_stmt_bind_param($stmt,"issssisss", $BADGENO, $INCIDENTDATES, $LOCATIONS, $CITYY, $DETAIL,$USERSID,$STATUS1,$media1,$ASSIGN1);
     mysqli_stmt_execute($stmt);
     mysqli_stmt_close($stmt);
 
    }