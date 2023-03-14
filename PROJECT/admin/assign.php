
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="./admin.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="../styles.css">
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
    <a href="./admcomplaints.php"><li class="child" ><i class="fad fa-book "></i>Complaints</li></a>
    <a href="./admdriver.php"><li><i class="fad fa-user"></i>Drivers</li></a>
    <a href="./admpolice.php"><li><i class="fas fa-user"></i>Police Officer</li></a>
    <a href="./admreport.php"><li><i class="fad fa-file"></i>Reports</li></a>
    <a href="./investigat.php"><li><i class="fas fa-user"></i>Investigators</li></a>
    <a href="./logoutad.php"><li><i ></i>LOG OUT</li></a>


    </div> 
</section>
<?php
 require_once '../includes/conn.php';
if(isset($_POST['accept']))
{
    $ud = $_POST['edittie'];
    $kuk = "SELECT complaintdriver.DRIVERCOMPLAINTID, complaintdriver.CARREG, complaintdriver.IncidentDATE, complaintdriver.CITY, complaintdriver.STREET, complaintdriver.IncidentDESC, complaintdriver.MEDIA, complaintdriver.DCOMPSTATUS, driver.OWNERNAME FROM complaintdriver
    INNER JOIN driver on complaintdriver.CARREG=driver.CARREG WHERE DRIVERCOMPLAINTID='$ud'";
    $kuk_run = mysqli_query($conn,$kuk);
    if(mysqli_num_rows($kuk_run)>0){
        foreach($kuk_run as $fun){
?>
<section class="kuk">
    <section class="sidepage">
        <div class="headie">
            <div class="top">
                <h3>Complaint Details</h3>
            </div>
            <section class="rest">
                    <section class="part1">
                        <form action="send.php" method="POST">
                        <div class="division"> 
                            <div class="part2"><b>ASSIGN TO</b></div>
                        </div>
                        <div class="division">  
                            <input type="text" name="assign">
                        </div>
                        <div class="division"> 
                        <small>
                            <?php
                            if(isset($_GET["error"])){
                            if($_GET["error"] == "emailnotsent1"){
                                echo "<p>Enter the right Email!</p>";
                            }                            
                            }?></small>  
                            <div class="part2">SEND TO:</div>
                        </div>
                        <div class="division">  
                        <input type="text" name="messo" placeholder="Enter the email ">
                        </div>
                        <div class="btn">
                        <input type="hidden" name="edipan" value="<?php echo $fun['DRIVERCOMPLAINTID']?>">
                        <input type="hidden" name="active" value="ACTIVE">
                        <button class="binin" name="binin">SUBMIT</button>
                        </div>
                        </form>
                    </section>
                    <section >
                    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1B02GfnwTYVZAJpwybjXXK6pnYT9Skufx&ehbc=2E312F" width="500" height="350"> </iframe>

                    </section>

            </section>
    </section>
    </section>
    <?php
                        }
                        
                    }
                    else
                    {
                        header("location: ./pendingsearch.php?error=problem");
                }
            }
            if(isset($_POST['reject'])){
                $ud = $_POST['edittie'];
                $reject=$_POST['rejectie'];
                
               echo " <section class='kuk'>
    <section class='sidepage'>
        <div class='headie'>
            <div class='top'>
                <h3>Reason For Rejection:</h3>
            </div>
            <section class='rest'>
                    <section class='part1'>
                        <form action='send99.php' method='POST'>
                        <div class='division'>  
                            <input type='hidden' name='ud' value='".$ud."'>
                            <input type='hidden' name='reje' value='".$reject."'>
                            <input type='hidden' name='rejected' value='REJECTED'>
                        </div>
                        <div class='division'>  
                        <textarea name='details'class='details1' maxlength='3000' rows='9' title='10 characters minimum'></textarea>
                        <button class='submit' type='submit' name='submit'>SUBMIT</button>
                        </div>
                        </form>
                    </section>
                    <section >
                    </section>

            </section>
    </section>
    </section>";
            

            }
    

            ?>
    
</section>

</section>
</body>
</html>
