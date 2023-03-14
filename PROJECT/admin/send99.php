<?php
require_once '../includes/conn.php';
if(isset($_POST['submit'])){
$TETA='tetagency390@gmail.com';
$reject=$_POST['reje'];
$ud=$_POST['ud'];
$details=$_POST['details'];
$nap=$_POST['rejected'];

$sql = "INSERT INTO dreports (DcomplaintID,Judgement,STATUSS) VALUES(?,?,?)";
//writing prepared statements to prevent the user from changing the code from the UI design infront or prevent any form of sql injection
 $stmt = mysqli_stmt_init($conn);
 if(!mysqli_stmt_prepare($stmt, $sql))
 {
     header("location: ../assign.php?error=stmtfailed");
     exit();
 }else{
 //grabbikng data from the database and checks if the user doesnot exst in the db
 mysqli_stmt_bind_param($stmt, "sss", $ud, $details,$nap);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);

 header("location: ../assign.php?error=none");
 
}

 //    UPDATE STATUS
 $pin= "UPDATE complaintdriver set DCOMPSTATUS= ? where DRIVERCOMPLAINTID= ? ";
 $chic = mysqli_stmt_init($conn);
 if(mysqli_stmt_prepare($chic, $pin)){
    mysqli_stmt_bind_param($chic, "ss", $reject, $ud);
    mysqli_stmt_execute($chic);
    mysqli_stmt_close($chic);
 }else{
    header("location: ./assign.php?error=notassigned");
 }

 //SEND EMAIL TO COMPLAINANT

 $SUBJECT12='COMPLAINT REJECTED';
$HEADIE12="From: ".$TETA;

$mu = "SELECT complaintdriver.DRIVERCOMPLAINTID, complaintdriver.USERID, complaintdriver.IncidentDATE, users.emailaddress FROM complaintdriver
JOIN users on complaintdriver.USERID=users.ID  WHERE DRIVERCOMPLAINTID='$ud'";
$mu_run = mysqli_query($conn,$mu);
if(mysqli_num_rows($mu_run)>0){
    foreach($mu_run as $so){
        $email12 =$so['emailaddress'];
        $complaintnu = $so['DRIVERCOMPLAINTID'];
        $dates1=$so['IncidentDATE'];

    }
}
 $MESSAGE12="The complaint that you filed, complaint number,".$complaintnu." that happened on ".$dates1.", is invalid and has been rejected. Kindly file valid complaints";

 if(mail($email12, $SUBJECT12,$MESSAGE12,$HEADIE12)){
    header("location: ./admcomplaints.php");
   
   }
   else{
       header("location: ./assign.php?error=emailnotsent");
    }
}