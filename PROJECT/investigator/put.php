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
<section>
<?php include ('../headers/header2.php');
include '../includes/conn.php';
session_start();
$INVE=$_SESSION['InvestID'];
$sele="SELECT* FROM investigators where InvestID= $INVE";
$sele_run = mysqli_query($conn,$sele);
    if(mysqli_num_rows($sele_run)>0){
        foreach($sele_run as $non){

            $mail=$non['emailaddress'];
        }}
?>


</section>

<section class="whole">
<section id="admenu">
   <div class='items'>
    <a href='./indexpage.php'><li ><i class='fad fa-book '></i>ASSIGNED</li></a>
    <a href='./put.php'><li class='child'><i class='fad fa-user'></i>REPORT</li></a>
    <a href='./logout2.php'><li><i class='fad fa-user'></i>LOG OUT</li></a>
    </div>
    </div> 
</section>
<section class="kuk">
<table>
             <thead>
             <tr>
                 <td>Complaint No.</td>
                 <td>Complainant</td>
                 <td>Status</td>
                 <td></td>
             </tr>
        </thead>
        <tbody>
             <?php
            include '../includes/conn.php';               
                 $query3= "SELECT complaintpolice.POLICECOMPLAINTID, complaintpolice.USERID, complaintpolice.PCOMPSTATUS,complaintpolice.ASSIGN_TO
                FROM complaintpolice where complaintpolice.ASSIGN_TO='$mail' ;";
                $query_run = mysqli_query($conn,$query3);
                if(mysqli_num_rows($query_run)>0)
                {
                    foreach($query_run as $items){
                        ?>
                         <tr>
                            <td><?= $items['POLICECOMPLAINTID']; ?></td>
                            <td><?= $items['PCOMPSTATUS']; ?></td>
                            <td><form action="../admin/folders/policefinalpdf.php" method="POST">
                            <input type="hidden" name="banto" value="<?php echo $items['PCOMPSTATUS']?>">
                                <input type="hidden" name="editd" value="<?php echo $items['POLICECOMPLAINTID']?>">
                                <button id="edit" class="field1" name="editbtn">VIEW</button></form>
                            </td>

                         </tr>
                         

                         <?php
                        }
                        
                    }
                    else
                    {
                        echo "<div class='searchpara'>NO RECORD FOUND</div>";
                }
                
            
            ?>
           
        </tbody>
         </table>
</section>
        
    
</section>

</section>
</body>
</html>