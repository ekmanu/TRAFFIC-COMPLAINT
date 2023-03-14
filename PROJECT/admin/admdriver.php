<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./admin.css">
    <link rel="stylesheet" href="../signup.css">
    <link rel="stylesheet" href="../complaintshistory.css">
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
    <a href="./users.php"><li ><i class="fad fa-user-circle"></i>Users</li></a>
    <a href="./admcomplaints.php"><li><i class="fad fa-book "></i>Complaints</li></a>
    <a href="./admdriver.php"><li class="child"><i class="fad fa-user"></i>Drivers</li></a>
    <a href="./admpolice.php"><li ><i class="fas fa-user"></i>Police Officer</li></a>
    <a href="./admreport.php"><li><i class="fad fa-file"></i>Reports</li></a>
    <a href="./investigat.php"><li><i class="fas fa-user"></i>Investigators</li></a>
    <a href="./logoutad.php"><li><i ></i>LOG OUT</li></a>

    </div> 
</section>
<section class="kuk">
    <h3 class="names">Dashboard</h3>
    <small >  <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"] == "none"){
                                echo "<p>Successfully Registered!</p>";
                            }} ?>
                </small>
    <div class="paragraph1">
            <div class="col4">
                
                    <a href="./listdriver.php">
                        <img src="../img/driver-icon-27020.png" alt="Icon complaint process">
                        <span>MOTORISTS/BIKER</span>
                    </a>
            </div>
            <div class="col4">
                <p>
                    <a href="./adddriver.php">
                        <img src="../img/registration.png" alt="Icon complaint">
                        <span>ADD A MOTORIST/BIKER</span>
                    </a>
                </p>
            </div>
        </div>
</section>

</section>
</body>
</html>