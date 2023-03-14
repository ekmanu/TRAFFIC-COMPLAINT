<?php
session_start();

require './complaintfunctions.php';
require './includes/conn.php';

if (isset($_POST["submit"])){
    $ASSIGN='NOT ASSIGNED';
    $CARREG = $_POST["carreg"];  
    $INCIDENTDATE = $_POST["IncidentDATE"];
    $LOCATION = $_POST["street"];
    $CITY = $_POST["city"];
    $DETAILS = $_POST["details"];
    $USERID = $_SESSION['USERID'];
    $STATUS='PENDING';
    $media=$_FILES['media']['name'];
    $position1 = "./complaintmedia/".basename($_FILES['media']['name']);
    $mediasize=$_FILES['media']['size'];
    $validmediaextension=['jpg','jpeg','png','gif','mp4','mkv','mov'];
    $mediaextension= explode('.',$media);
    $mediaextension= strtolower(end($mediaextension));

    if(invalidmediaextension($mediaextension,$validmediaextension) !==false){
        header("location: ./usercomplaints.php?error=invalidmediaextension");
        
    }
    if(invalidmediasize($mediasize)==false){
        header("location: ./usercomplaints.php?error=invalidmediasize");
    }


    if (no_inputs($CARREG, $INCIDENTDATE, $LOCATION, $CITY, $DETAILS) !==false){
        header("location: ./usercomplaints.php?error=emptyinput");
        exit();
      
    }

    createpcomplaint($conn,$CARREG,$INCIDENTDATE,$LOCATION,$CITY,$DETAILS,$USERID,$STATUS,$media,$position1,$ASSIGN);
    
    $query= "SELECT DRIVERCOMPLAINTID,USERID from complaintdriver WHERE USERID=$USERID";
    $query_run = mysqli_query($conn,$query);

    if(mysqli_num_rows($query_run)>0)
                {
                    foreach($query_run as $items){
                        $DID=$items['DRIVERCOMPLAINTID'];
                    }}

    $FIRSTNAME=$_SESSION['FIRSTNAME'];
    $SECONDNAME=$_SESSION['SECONDNAME'];
    $EMAIL=$_SESSION['EMAILADDRESS'];
    $SUBJECT='COMPLAINT SUBMISSION';
    $TETA='tetagency390@gmail.com';
    $MESSAGE="Thank You Mr/Mrs.".$FIRSTNAME."\n".$SECONDNAME."\n"."your complaint has been received and registered as complaint ".$DID.".Teta Agency will look into the compalint and contact you shortly";
    $HEADERS="From: ".$TETA;
  
    if(mail($EMAIL,$SUBJECT,$MESSAGE,$HEADERS)){
        header("location: ./usercomplaints.php?error=emailsent");
       
       }
       else{
           header("location: ./usercomplaints.php?error=emailnotsent");
           exit();
   
       }


}
else{
    header("location: ./usercomplaints.php?error=problem");
    exit();
}

