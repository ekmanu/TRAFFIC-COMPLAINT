<?php
session_start();
 require_once '../includes/conn.php';
    require_once '../includes/functions.php'; 

if(isset($_REQUEST["login"])){
    

     $userID= $_REQUEST['ID'];
     $password= $_REQUEST['passwrd'];
     $validmailextension=['net'];
     
     if (no_inputs_login($userID, $password) !==false){

     }else{ 

     $results = login($conn, $userID, $password );

     foreach($results as $r){
        $pwd_check = password_verify($password, $r['passwrd']);

        if($pwd_check === true){
            $_SESSION['USERID']= $r['ID'];
            $_SESSION['emailaddress']=$r['emailaddress'];
            $email=$_SESSION['emailaddress'];
            $mailextension = explode('.',$email);
            $mails= strtolower(end($mailextension));
            if($mails=='net'){
            header("location: ../admin/admin.php");
            exit();
        }
            else if($mails=="com"){
            header("location: ../index.php");
            exit();}
            
        }else
        {
            header("location: ../login.php?error=wronglogin");
        }
   
    }


}
}

?>