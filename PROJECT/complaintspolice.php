<?php
session_start();

require './complaintfunctions.php';
require './includes/conn.php';



if (isset($_POST["submits"])){
    $ASSIGN1='NOT ASSIGNED';
    $BADGENO = $_POST["badgeNo"];  
    $INCIDENTDATES = $_POST["IncidentDATE"];
    $LOCATIONS = $_POST["street"];
    $CITYY = $_POST["city"];
    $DETAIL = $_POST["details"];
    $MEDIAS = $_POST["media"];
    $USERSID = $_SESSION['USERID'];
    $STATUS1='PENDING';

    $media1=$_FILES['media']['name'];
    $position12 = "./complaintmedia/".basename($_FILES['media']['name']);
    $mediasize=$_FILES['media']['size'];
    $validmediaextension=['jpg','jpeg','png','gif','mp4','mkv','mov'];
    $mediaextension= explode('.',$media1);
    $mediaextension= strtolower(end($mediaextension));

    if(invalidmediaextension($mediaextension,$validmediaextension) !==false){
        header("location: ./policecomplaints.php?error=invalidmediaextension");
        exit();
        
    }
    if(invalidmediasize($mediasize)==false){
        header("location: ./policecomplaints.php?error=invalidmediasize");
        exit(); 
    }



    if (no_policeinputs($INCIDENTDATES, $LOCATIONS, $CITYY , $DETAIL) !==false){
        header("location: ./policecomplaints.php?error=emptyinput");
        exit();
      
    }
    
    
    createpcomplaints($conn,$BADGENO,$INCIDENTDATES,$LOCATIONS,$CITYY,$DETAIL,$USERSID, $STATUS1,$media1,$position12,$ASSIGN1);
   
    $query= "SELECT POLICECOMPLAINTID,USERID from complaintpolice WHERE USERID=$USERSID";
    $query_run = mysqli_query($conn,$query);

    if(mysqli_num_rows($query_run)>0)
                {
                    foreach($query_run as $items){
                        $DID=$items['POLICECOMPLAINTID'];
                    }}
   
   
    $FIRSTNAMES=$_SESSION['FIRSTNAME'];
    $SECONDNAMES=$_SESSION['SECONDNAME'];
    $EMAILS=$_SESSION['EMAILADDRESS'];
    $SUBJECTS='COMPLAINT SUBMISSION';
    $TETAS='tetagency390@gmail.com';
    $MESSAGES="Thank You Mr/Mrs.".$FIRSTNAMES."\n".$SECONDNAMES."\n"."your Email has been received and registered as ".$DID.". Teta Agency will look into the compalint and contact you shortly";
    $HEADER="From: ".$TETAS;

    $query= "SELECT POLICECOMPLAINTID,USERID from complaintpolice WHERE USERID=$USERSID";
    $query_run = mysqli_query($conn,$query);

    if(mysqli_num_rows($query_run)>0)
                {
                    foreach($query_run as $items){
                        $DID=$items['DRIVERCOMPLAINTID'];
                    }}

    if(mail($EMAILS,$SUBJECTS,$MESSAGES,$HEADER)){
        header("location: ./policecomplaints.php?error=emailsent");
       
       }
       else{
           header("location: ./policecomplaints.php?error=emailnotsent");
           exit();
       }
}
else{
    header("location: ./policecomplaints.php?error=problem");
    exit();
}

