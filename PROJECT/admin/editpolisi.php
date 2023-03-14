<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="./adminform.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
</head>
<body>
<?php include ('../headers/header2.php');
session_start();

?>
<section class="whole">
<section id="admenu">
    <div class="items">
    <a href="./admin.php"><li><i class="fad fa-rocket"></i>Dashboard</li></a>
    <a href="./users.php"><li><i class="fad fa-user-circle"></i>Users</li></a>
    <a href="./admcomplaints.php"><li><i class="fad fa-book "></i>Complaints</li></a>
    <a href="./admdriver.php"><li><i class="fad fa-user"></i>Drivers</li></a>
    <a href="./admpolice.php"><li class="child"><i class="fas fa-user"></i>Police Officer</li></a>
    <a href="./admreport.php"><li><i class="fad fa-file"></i>Reports</li></a>
    <a href="./investigat.php"><li><i class="fas fa-user"></i>Investigators</li></a>
    <a href="./logoutad.php"><li><i ></i>LOG OUT</li></a>


    </div> 
</section>
<?php
if(isset($_POST['editbtn']))
{
    include ('../includes/conn.php');
    $id = $_POST['edit_id'];
    $finame = $_POST['finame'];
    $sename = $_POST['sename'];
    $phono = $_POST['phono'];
    $ema = $_POST['ema'];
    $res = $_POST['res'];
    $ma = $_POST['MAIL'];

}
if(isset($_POST['DELETE']))
{
    include ('../includes/conn.php');
    $id = $_POST['edit_id'];
    $send= "DELETE FROM policeofficer where BADGENO= '$id'";
     mysqli_query($conn,$send);
     header("location: ./admpolice.php?error=deleted");

}

?>
<div class="main">
        <form id ="form" class="form1" action="./editpolisifunction.php" method="POST" enctype="multipart/form-data" >
            <h1>Update POLICE Details</h1>
            <small>
         </small>
            <div class="forms">
            <label for="ID">BADGE NO</label>
            <input type="hidden" value="<?php echo $id?>" name="ID3" placeholder="Enter ID number">
            <input type="number" value="<?php echo $id?>" name="ID2" placeholder="Enter ID number">
            <small >  
                </small>
        </div>
        <div class="forms" >
            <label for="firstname">First Name</label>
            <input type="text" value="<?php echo $finame?>" name="funame" placeholder="Enter First Name">
            <small>
            
            </small>
        </div>
        <div class="forms">
            <label for="secondname">Second name</label>
            <input type="text" value="<?php echo $sename?>" name="siname" placeholder="Enter Second Name">
            <small>
          
            </small>
        </div>
        <div class="forms">
            <label for="phonenumber">Phone number</label>
            <input type="tel" value="<?php echo $phono?>" name="phone" placeholder="e.g. +254723456789">
            <small></small>
            </div>
         <div class="forms">
            <label for="email">EMAIL</label>
            <input type="tel" value="<?php echo $ma?>" name="mail" placeholder="enter email">
            <small></small>
            </div>
        <div class="forms">
                <label for="emailaddress">STATION BASED</label>
                <input type="text" value="<?php echo $ema?>" name="station" placeholder="Enter the POLICE STATION BASED">
                <small>  
                </small>
        </div>
        <div class="forms">
                <label for="emailaddress">RESIDENCE</label>
                <input type="text" value="<?php echo $res?>" name="res" placeholder="Enter residence">
                <small>  
                </small>
        </div>
        <button type="submit" name="submit">UPDATE  </button>
        </form>
    
</section>
</body>
</html>