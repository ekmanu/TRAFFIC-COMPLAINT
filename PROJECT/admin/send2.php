<?php
 require_once '../includes/conn.php'; 
 $pd=$_POST['edipan'];

if(isset($_POST["binin"])){
    include './folders/policepdf.php';
    $active=$_POST['active'];
    $messo=$_POST['messo'];
    $assign=$_POST['assign'];
    $TETA='tetagency390@gmail.com';

    //UPDATE STATUS
    $send= "UPDATE complaintpolice set PCOMPSTATUS= ?, ASSIGN_TO=? where POLICECOMPLAINTID= ? ";
     $chick = mysqli_stmt_init($conn);
     if(mysqli_stmt_prepare($chick, $send)){
        mysqli_stmt_bind_param($chick, "sss", $active,$messo,$pd);
        mysqli_stmt_execute($chick);
        mysqli_stmt_close($chick);
     }else{
        header("location: ./policeassign.php?error=notassigned");
     }

     $mum = "SELECT complaintpolice.POLICECOMPLAINTID, complaintpolice.USERID, complaintpolice.IncidentDATE,complaintpolice.MEDIA, users.emailaddress FROM complaintpolice
     JOIN users on complaintpolice.USERID=users.ID  WHERE POLICECOMPLAINTID='$pd'";
     $mum_run = mysqli_query($conn,$mum);
     if(mysqli_num_rows($mum_run)>0){
         foreach($mum_run as $son){
             $email1 =$son['emailaddress'];
             $complaintno = $son['POLICECOMPLAINTID'];
             $dates=$son['IncidentDATE'];
             $medi=$son['MEDIA'];
 
         }
     }
     
     $SUBJECT144='COMPLAINT UPDATE';
     $HEADIE15="From: ".$TETA;
     $message1="The complaint that you filed, complaint number,".$complaintno." that happened on ".$dates.", has been accepted and investigations has been assigned to ".$assign."";
     $file='../complaintmedia/'.$medi.'';
     mail($email1, $SUBJECT144,$message1,$HEADIE15);

    //  SEND EMAIL TO ASSIGNED
    $file='DOCUMENTS/'.$name.'';
    $HEADIE="From: ".$TETA;
    //boundary
    $semi_rand = md5(time());  
    $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
    // Headers for attachment  
     $HEADIE .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
     // Preparing attachment 
     $SUBJECT1='COMPLAINT REPORT';
    
    $eol = "\r\n";
// preparing attachment
     if(!empty($file) > 0){ 
      if(is_file($file)){ 
          $message .= "--{$mime_boundary}\n"; 
          $fp =fopen($file,"rb"); 
          $data =fread($fp,filesize($file)); 
    
          fclose($fp); 
          $data = chunk_split(base64_encode($data)); 

          $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .  
          "Content-Description: ".basename($file)."\n" . 
          "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .  
          "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
      } 
    }
    $message .= "--{$mime_boundary}--";  

     if(mail($messo,$SUBJECT1,$message,$HEADIE)){
        header("location: ./policeassign.php?error=emailsent");
       
       }
       else{
           header("location: ./policeassign.php?error=emailnotsent1");
           exit();
        }
        //sending complaint media
        $file2='../complaintmedia/'.$medi.'';
        $HEADIE2="From: ".$TETA;
        //boundary
        $semi_rand = md5(time());  
        $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x"; 
        // Headers for attachment  
         $HEADIE2 .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";
         // Preparing attachment 
         $SUBJECT12="COMPLAINT".$complaintno." MEDIA";
        
        $eol = "\r\n";
    // preparing attachment
         if(!empty($file2) > 0){ 
          if(is_file($file2)){ 
              $message2 .= "--{$mime_boundary}\n"; 
              $fp =fopen($file2,"rb"); 
              $data =fread($fp,filesize($file2)); 
        
              fclose($fp); 
              $data = chunk_split(base64_encode($data)); 
    
              $message2 .= "Content-Type: application/octet-stream; name=\"".basename($file2)."\"\n" .  
              "Content-Description: ".basename($file2)."\n" . 
              "Content-Disposition: attachment;\n" . " filename=\"".basename($file2)."\"; size=".filesize($file2).";\n" .  
              "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n"; 
          } 
        }
        $message2 .= "--{$mime_boundary}--";  
    
         if(mail($messo,$SUBJECT12,$message2,$HEADIE2)){
            header("location: ./assign.php?error=emailsent");
           
           }
           else{
               header("location: ./assign.php?error=emailnotsent1");
               exit();
            }
       


    // SEND MAIL TO OFFENDER

    $SUBJECT3='COMPLAINT FILED AGAINST YOU';
    $HEADIE1="From: ".$TETA;
    $dad = "SELECT complaintpolice.POLICECOMPLAINTID,complaintpolice.BADGENO, complaintpolice.IncidentDATE,complaintpolice.IncidentDESC,complaintpolice.CITY,complaintpolice.STREET,complaintpolice.MEDIA, policeofficer.FULLNAME,policeofficer.secondname, policeofficer.EMAIL FROM complaintpolice
    JOIN policeofficer on complaintpolice.BADGENO=policeofficer.BADGENO WHERE POLICECOMPLAINTID= '$pd' ";
    $dad_run = mysqli_query($conn,$dad);
    if(mysqli_num_rows($dad_run)>0){
        foreach($dad_run as $dod){
            $email2 =$dod['EMAIL'];
            $jina=$dod['FULLNAME'];
            $jina098=$dod['secondname'];
            $date2=$dod['IncidentDATE'];
            $CITY=$dod['CITY'];
            $STREET=$dod['STREET'];
            $DESC=$dod['IncidentDESC'];
            $CARREG=$dod['BADGENO'];
            $MEDIA=$dod['MEDIA'];

        }
    }
   
     $MESSAGE3="Mr/Mrs.".$jina."&nbsp".$jina098.", I am writing to you concerning a complaint made against you on ".$date2.", where you were witnessed to have violated the traffic rules.Kindly visit ".$assign." or any nearby police station to clear your charges in order to avoid forceful arrest and increase in charges.";
     if(mail($email2, $SUBJECT3,$MESSAGE3,$HEADIE1)){
        header("location: ./admcomplaints.php?error=sent");
       
       }
       else{
           header("location: ./policeassign.php?error=emailnotsent");
           exit();
        }


    }