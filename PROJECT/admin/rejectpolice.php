<?php
if(isset($_POST['submit'])){
require_once '../includes/conn.php';
$TETA='tetagency390@gmail.com';
$reject=$_POST['reje'];
$ud=$_POST['ud'];
$details=$_POST['details'];
$nap=$_POST['rejected'];
$sql = "INSERT INTO preports (PcomplaintID,Judgement,STATUSS) VALUES(?,?,?)";
//writing prepared statements to prevent the user from changing the code from the UI design infront or prevent any form of sql injection
 $stmt = mysqli_stmt_init($conn);
 if(!mysqli_stmt_prepare($stmt, $sql))
 {
     header("location: ../admcomplaints.php?error=stmtfailed");
     exit();
 }else{
 //grabbikng data from the database and checks if the user doesnot exst in the db
 mysqli_stmt_bind_param($stmt, "sss", $ud, $details,$nap);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt);

 header("location: ../admcomplaints.php?error=none");
 
}
//UPDATE STATUS
$pin= "UPDATE complaintpolice set PCOMPSTATUS= ? where POLICECOMPLAINTID= ? ";
$chic = mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($chic, $pin)){
   mysqli_stmt_bind_param($chic, "ss", $reject, $ud);
   mysqli_stmt_execute($chic);
   mysqli_stmt_close($chic);
}else{
   header("location: ./admcomplaints.php?error=notassigned");
}

//SEND EMAIL TO COMPLAINANT

$SUBJECT12='COMPLAINT REJECTED';
$HEADIE12="From: ".$TETA;

$mu = "SELECT complaintpolice.POLICECOMPLAINTID, complaintpolice.USERID, complaintpolice.IncidentDATE, users.emailaddress FROM complaintpolice
JOIN users on complaintpolice.USERID=users.ID  WHERE POLICECOMPLAINTID='$ud'";
$mu_run = mysqli_query($conn,$mu);
if(mysqli_num_rows($mu_run)>0){
   foreach($mu_run as $so){
       $email12 =$so['emailaddress'];
       $complaintnu = $so['POLICECOMPLAINTID'];
       $dates1=$so['IncidentDATE'];

   }
}
$MESSAGE12="The complaint that you filed, complaint number,".$complaintnu." that happened on ".$dates1.", has undergone investigations and is proven not to be a sufficient complaint against the offending officer.";

if(mail($email12, $SUBJECT12,$MESSAGE12,$HEADIE12)){
   header("location: ./prcomplaint.php");
  
  }
  else{
      header("location: ./assign.php?error=emailnotsent");
   }
}


?>