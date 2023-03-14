<?php
session_start();
 require_once '../includes/conn.php';
    require_once './loginsetfunction.php'; 

if(isset($_REQUEST["submit"])){
    

     $userID= $_REQUEST['ID2'];
     $password= $_REQUEST['pass'];
     
     if (no_inputs_login($userID, $password) !==false){

     }else{ 

     $results = login($conn, $userID, $password );

     foreach($results as $r){
        $pwd_check = password_verify($password, $r['passwrd']);

        if($pwd_check === true){
            $_SESSION['InvestID']= $r['InvestID'];
            header("location: ./indexpage.php");
            exit();
        }else
        {
            header("location: ./indexpage.php?error=wronglogin");
        }
   
    }


}
}

?>