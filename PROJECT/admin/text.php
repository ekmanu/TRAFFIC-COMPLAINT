<?php
$mum = "SELECT complaintdriver.DRIVERCOMPLAINTID, complaintdriver.USERID, complaintdriver.IncidentDATE, users.emailaddress FROM complaintdriver
    JOIN users on complaintdriver.USERID=users.ID  WHERE DRIVERCOMPLAINTID='$pd'";
    $mum_run = mysqli_query($conn,$mum);
    if(mysqli_num_rows($mum_run)>0){
        foreach($mum_run as $son){
            $email1 =$son['emailaddress'];
            $complaintno = $son['DRIVERCOMPLAINTID'];
            $dates=$son['IncidentDATE'];

        }
    }
    echo $email1;