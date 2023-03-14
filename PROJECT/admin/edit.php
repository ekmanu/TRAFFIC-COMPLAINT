
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
    <a href="./admin.php"><li><i class="fad fa-rocket"></i>Dashboard</li></a>
    <a href="./users.php"><li><i class="fad fa-user-circle"></i>Users</li></a>
    <a href="./admcomplaints.php"><li class="child"><i class="fad fa-book "></i>Complaints</li></a>
    <a href="./admdriver.php"><li><i class="fad fa-user"></i>Drivers</li></a>
    <a href="./admpolice.php"><li><i class="fas fa-user"></i>Police Officer</li></a>
    <a href="./admreport.php"><li><i class="fad fa-file"></i>Reports</li></a>
    <a href="./investigat.php"><li><i class="fas fa-user"></i>Investigators</li></a>
    <a href="./logoutad.php"><li><i ></i>LOG OUT</li></a>
    </div> 
</section>
<?php
  include '../includes/conn.php';

if(isset($_POST['editbtn']))
{
    $id = $_POST['edit_id'];
    $status = $_POST['status'];
    $mod = "SELECT complaintdriver.DRIVERCOMPLAINTID, complaintdriver.CARREG, complaintdriver.IncidentDATE, complaintdriver.CITY, complaintdriver.STREET, complaintdriver.IncidentDESC, complaintdriver.MEDIA, complaintdriver.DCOMPSTATUS, driver.OWNERNAME FROM complaintdriver
    INNER JOIN driver on complaintdriver.CARREG=driver.CARREG WHERE DRIVERCOMPLAINTID='$id'";
    $mod_run = mysqli_query($conn,$mod);
    if(mysqli_num_rows($mod_run)>0){
        foreach($mod_run as $non){
        $imag=$non['MEDIA'];
        $DID=$non['DRIVERCOMPLAINTID']
        ;}
        $validmediaextension=['jpg','jpeg','png','gif'];
        $validmediaextension1=['mp4','mkv','mov'];
        $mediaextension= explode('.',$imag);
        $mediaextension= strtolower(end($mediaextension));

?>
<section class="kuk">
    <section class="sidepage">
        <div class="headie">
            <div class="top">
                <h3>Complaint Details</h3>
            </div>
            <div class="rest">
                    <div class="part1">
                        <div class="division">  
                            <div class="part2">Complaint#:</div>
                            <div class="part3"><?=$non['DRIVERCOMPLAINTID'];?></div>
                        </div>
                        <div class="division">  
                            <div class="part2">Date/Time:</div>
                            <div class="part3"><?=$non['IncidentDATE'];?></div>
                        </div>
                        <div class="division">  
                            <div class="part2">Location:</div>
                            <div class="part3"><?=$non['STREET'].",".$non['CITY'];?></div>
                        </div>
                        <div class="division">  
                            <div class="part2">Offender's CAR NO.:</div>
                            <div class="part3"><?=$non['CARREG'];?></div>
                        </div>
                        <div class="division">  
                            <div class="part2">Offender's Name:</div>
                            <div class="part3"><?=$non['OWNERNAME'];?></div>
                        </div>
                        <div class="division2">  
                            <div class="part2">Complaint Details:</div>
                        </div>
                        <div class="division2">  
                            <div class="part3"><?=$non['IncidentDESC'];?></div>
                        </div>
                        <?php
                        if(in_array($mediaextension,$validmediaextension)){
                            echo "<div class='division2'>  
                            <button id='edit'class='field2' name='editbtn' onclick='change()''>MEDIA</button>
                            </div>
                            <div id='pop' class='pop1'>
                                <div class='pop2'>
                                <img src='../complaintmedia/".$imag."' width='400'height='400'>  
                                <a id='close' class='open' onclick='shut()'>&times;</a>
                                </div>
                            </div>";
                        }else if(in_array($mediaextension,$validmediaextension1)){
                            echo "<div class='division2'>  
                            <button id='edit'class='field2' name='editbtn' onclick='change()''>MEDIA</button>
                            </div>
                            <div id='pop' class='pop1'>
                                <div class='pop2'>
                                <video controls width='400' height='400'><source src='../complaintmedia/".$imag."'></video>  
                                <a id='close' class='open' onclick='shut()' >&times;</a>
                                </div>
                                <script src='show.js'></script> 
                            </div>";
                        }
                        ?>  
                        <?php
                        if($status == 'PENDING'){
                        echo "
                       <div class='btn'>
                            <form action='assign.php' method='POST'>
                            <input type='hidden' name='edittie' value=".$DID.">
                            <button class='btttn' name='accept'>Accept</button>
                            <input type='hidden' name='rejectie' value='CLOSED'>
                            <button class='btttn' name='reject'>Reject</button></form>
                        </div>";}else{
                            echo " ";
                        }?>
        </div>
        </div>
        </div>
    </section>
    </section>
    <?php
                        }
                        
                    }
                    else
                    {
                        header("location: ./pendingsearch.php?error=problem");
                }
            
            ?>
</section>
</section>
<script src="show.js"></script>
</body>
</html>
