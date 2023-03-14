
<?php
require_once '../includes/conn.php';
if(isset($_POST['submit'])){
$TETA='tetagency390@gmail.com';
$closed=$_POST['closed'];
$ud=$_POST['ud'];
$details=$_POST['details'];
$nap=$_POST['acc'];

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
    mysqli_stmt_bind_param($chic, "ss", $closed, $ud);
    mysqli_stmt_execute($chic);
    mysqli_stmt_close($chic);
    header("location: ./admreport.php?error=none");
 }else{
    header("location: ./admreport.php?error=notassigned");
 }
}