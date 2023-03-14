
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <script language="javascript" type="text/javascript">
        window.history.forward();
    </script>
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
    <a href='./put.php'><li><i class='fad fa-user'></i>REPORT</li></a>
    <a href='./logout2.php'><li><i class='fad fa-user'></i>LOG OUT</li></a>
    </div>
    </div> 
</section>
<?php
  include '../includes/conn.php';

if(isset($_POST['vbtn']))
{
    $id = $_POST['editd'];
    $mod = "SELECT complaintpolice.POLICECOMPLAINTID, complaintpolice.BADGENO, complaintpolice.IncidentDATE, complaintpolice.CITY, complaintpolice.STREET, complaintpolice.IncidentDESC, complaintpolice.MEDIA, complaintpolice.PCOMPSTATUS, policeofficer.FULLNAME FROM complaintpolice
    INNER JOIN policeofficer on complaintpolice.BADGENO=policeofficer.BADGENO WHERE POLICECOMPLAINTID='$id'";
    $mod_run = mysqli_query($conn,$mod);
    if(mysqli_num_rows($mod_run)>0){
        foreach($mod_run as $non){
        $photobom=$non['MEDIA'];}
        $validmediaextension=['jpg','jpeg','png','gif'];
        $validmediaextension1=['mp4','mkv','mov'];
        $mediaextension= explode('.',$photobom);
        $mediaextension= strtolower(end($mediaextension));

?>
<section class="kuk">
    <section class="sidepage">
        <div class="headie">
            <div class="top">
                <h3>Complaint Details</h3>
            </div>
            <section class="rest">
                    <section class="part1">
                        <div class="division">  
                            <div class="part2">Complaint #</div>
                            <div class="part3"><?= $non['POLICECOMPLAINTID'];?></div>
                        </div>
                        <div class="division">  
                            <div class="part2">Date/Time </div>
                            <div class="part3"><?= $non['IncidentDATE'];?></div>
                        </div>
                        <div class="division">  
                            <div class="part2">Location </div>
                            <div class="part3"><?= $non['STREET'].",".$non['CITY'];?></div>
                        </div>
                        <div class="division">  
                            <div class="part2">Offender's BADGE NO.</div>
                            <div class="part3"><?= $non['BADGENO'];?></div>
                        </div>
                        <div class="division">  
                            <div class="part2">Offender's Name</div>
                            <div class="part3"><?= $non['FULLNAME'];?></div>
                        </div>
                        <div class="division2">  
                            <div class="part2">Complaint Details </div>
                        </div>
                        <div class="division2">  
                            <div class="part3"><?= $non['IncidentDESC'];?></div>
                        </div>
                        <?php
                        if(in_array($mediaextension,$validmediaextension)){
                            echo "<div class='division2'>  
                            <button id='edit'class='field2' name='editbtn' onclick='change()''>MEDIA</button>
                            </div>
                            <div id='pop' class='pop1'>
                                <div class='pop2'>
                                <img src='../complaintmedia/".$photobom."' width='400'height='400'>  
                                <a  id='close' class='open' onclick='shut()'>&times;</a>
                                </div>
                            </div>";
                        }else if(in_array($mediaextension,$validmediaextension1)){
                            echo "<div class='division2'>  
                            <button id='edit'class='field2' name='editbtn' onclick='change()''>MEDIA</button>
                            </div>
                            <div id='pop' class='pop1'>
                                <div class='pop2'>
                                <video controls width='400' height='400'><source src='../complaintmedia/".$photobom."'></video>  
                                <a id='close' class='open' onclick='shut()' >&times;</a>
                                </div>
                            </div>";
                        }
                        ?> 
                        <div class="btn">
                            <form action="accepting.php" method="POST">
                            <input type="hidden" name="editable" value="<?php echo $non['POLICECOMPLAINTID']?>">
                            <button class="btttn" name="accept">Accept</button></form>
                            <form action="policeassignment.php" method="POST">
                            <input type="hidden" name="editables" value="<?php echo $non['POLICECOMPLAINTID']?>">
                            <input type="hidden" name="rejectie" value="REJECTED">
                            <button class="btttn" name="reject">Reject</button></form>
                        </div>

                    </section>
                    <section>

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
            
            ?>
    
</section>
</section>
<script src="../admin/show.js"></script>
</body>
</html>
