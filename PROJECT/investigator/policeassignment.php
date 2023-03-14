
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="../admin/admin.css">
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
</head>
<body>
<?php include ('../headers/header2.php');

session_start();

?>
<section class="whole">
<section id="admenu">
   <div class='items'>
    <a href='./indexpage.php'><li class='child'><i class='fad fa-book '></i>ASSIGNED</li></a>
    <a href='../admin/register.php'><li><i class='fad fa-user'></i>REPORT</li></a>
    <a href='./logout2.php'><li><i class='fad fa-user'></i>LOG OUT</li></a>
    </div>
    </div> 
</section>
<?php
 require_once '../includes/conn.php';

if(isset($_POST['accept']))
{
    $ud = $_POST['editable'];
    $details=$_POST['info'];
    $nap=$_POST['ACCEPTED'];
    $sql= "INSERT INTO preports (PcomplaintID,Judgement,STATUSS) VALUES(?,?,?)";
//writing prepared statements to prevent the user from changing the code from the UI design infront or prevent any form of sql injection
 $stmt = mysqli_stmt_init($conn);
 if(!mysqli_stmt_prepare($stmt, $sql))
 {
     header("location: ./policeassignment.php?error=stmtfailed");
     exit();
 }else{
 //grabbikng data from the database and checks if the user doesnot exst in the db
 mysqli_stmt_bind_param($stmt, "sss", $ud, $details,$nap);
 mysqli_stmt_execute($stmt);
 mysqli_stmt_close($stmt); 
}
    $kuk = "SELECT complaintpolice.POLICECOMPLAINTID, complaintpolice.BADGENO, complaintpolice.IncidentDATE, complaintpolice.CITY, complaintpolice.STREET, complaintpolice.IncidentDESC, complaintpolice.MEDIA, complaintpolice.PCOMPSTATUS, policeofficer.FULLNAME FROM complaintpolice
    INNER JOIN policeofficer on complaintpolice.BADGENO=policeofficer.BADGENO WHERE POLICECOMPLAINTID='$ud'";
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
                        <form action="sendinfo.php" method="POST">
                        <div class="division">  
                            <div class="part2"><b>SEND DETAILS TO:</b></div>
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
                            <div class="part2">ENTER MAIL:</div>
                        </div>
                        <div class="division">  
                        <input type="text" name="messo" placeholder="Enter the email ">
                        </div>
                        <div class="btn">
                        <input type="hidden" name="edipan" value="<?php echo $fun['POLICECOMPLAINTID']?>">
                        <input type="hidden" name="CLOSED" value="CLOSED">
                        <button class="binin" name="binin">SUBMIT</button>
                        </div>
                        </form>
                    </section>
                    <section >
                    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1BZUVWYEbh-SZWNvPHXaVK1ep0Gp2yj8C&ehbc=2E312F" width="500" height="400"></iframe>                    </div>
                    </section>
            </section>
    </section>
    </section>
    <?php
                        }
                        
                    }
                    else
                    {
                        header("location: ./indexpage.php?error=problem");
                }
            }
            if(isset($_POST['reject'])){
                $ud = $_POST['editables'];
                $reject=$_POST['rejectie'];
                echo " <section class='kuk'>
                <section class='sidepage'>
                    <div class='headie'>
                        <div class='top'>
                            <h3>Reason For Rejection:</h3>
                        </div>
                        <section class='rest'>
                                <section class='part1'>
                                    <form action='rejectpolice.php' method='POST'>
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
