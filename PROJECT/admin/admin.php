<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./admin.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
</head>
<body>
<?php include ('../headers/header2.php');
session_start();

?>
<section class="whole">
<section id="admenu">
    <div class="items">
    <a href="./admin.php"><li class="child"><i class="fad fa-rocket"></i>Dashboard</li></a>
    <a href="./users.php"><li><i class="fad fa-user-circle"></i>Users</li></a>
    <a href="./admcomplaints.php"><li><i class="fad fa-book "></i>Complaints</li></a>
    <a href="./admdriver.php"><li><i class="fad fa-user"></i>Drivers</li></a>
    <a href="./admpolice.php"><li><i class="fas fa-user"></i>Police Officer</li></a>
    <a href="./admreport.php"><li><i class="fad fa-file"></i>Reports</li></a>
    <a href="./investigat.php"><li><i class="fas fa-user"></i>Investigators</li></a>
    <a href="./logoutad.php"><li><i ></i>LOG OUT</li></a>
    </div> 
</section>
<section class="kuk">
    <h3 class="names">Dashboard</h3>
    <section class="area1">
    <div class="values">
        <div class="box">
            <i class="admimage"><img src="../img/users2.PNG" alt=""></i>
            <div class="details">
                <?php
                include ('../includes/conn.php');
                $query8= "SELECT ID FROM users ";
                $queryru=mysqli_query($conn,$query8);
                $row8 = mysqli_num_rows($queryru);
                echo '<h3>'.$row8.'</h3>';
                ?>
                <span>users</span>
            </div>
        </div>
    </div>
    <div class="values">
        <div class="box">
            <i class="admimage"><img src="../img/complaints.PNG" alt=""></i>
            <div class="details">
            <?php
                include ('../includes/conn.php');
                $query= "SELECT DRIVERCOMPLAINTID FROM complaintdriver";
                $query790= "SELECT POLICECOMPLAINTID FROM complaintpolice";
                $queryrun=mysqli_query($conn,$query);
                $queryrun5=mysqli_query($conn,$query790);
                $row908 = mysqli_num_rows($queryrun5);
                $row = mysqli_num_rows($queryrun);
                $add2=$row + $row908;
                echo '<h3>'.$add2.'</h3>';
                ?>
                <span>Complaints</span>
            </div>
        </div>
    </div>
    <div class="values">
        <div class="box">
            <i class="admimage"><img src="../img/driver2.PNG" alt=""></i>
            <div class="details">
            <?php
                include ('../includes/conn.php');
                $query8= "SELECT CARREG FROM driver ";
                $queryru=mysqli_query($conn,$query8);
                $row8 = mysqli_num_rows($queryru);
                echo '<h3>'.$row8.'</h3>';
                ?>
                <span>Drivers</span>
            </div>
        </div>
    </div>
    </section>
    <section class="area1">
    <div class="values">
        <div class="box">
            <i class="admimage"><img src="../img/police.PNG" alt=""></i>
            <div class="details">
            <?php
                include ('../includes/conn.php');
                $query8= "SELECT BADGENO FROM policeofficer";
                $queryru=mysqli_query($conn,$query8);
                $row8 = mysqli_num_rows($queryru);
                echo '<h3>'.$row8.'</h3>';
                ?>
                <span>Police Officers</span>
            </div>
        </div>
    </div>
    <div class="values">
        <div class="box">
            <i class="admimage"><img src="../img/reports2.PNG" alt=""></i>
            <div class="details">
            <?php
                include ('../includes/conn.php');
                $query= "SELECT ID FROM preports";
                $query790= "SELECT ID FROM dreports";
                $queryrun=mysqli_query($conn,$query);
                $queryrun5=mysqli_query($conn,$query790);
                $row908 = mysqli_num_rows($queryrun5);
                $row = mysqli_num_rows($queryrun);
                $add2=$row + $row908;
                echo '<h3>'.$add2.'</h3>';
                ?>
                <span>Reports</span>
            </div>
        </div>
    </div>
    </section>
</section>

</section>
</body>
</html>